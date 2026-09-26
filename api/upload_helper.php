<?php
/**
 * Upload Helper for Shining School Student Documents API
 */

class UploadHelper {
    // Mapping of all student documents
    const DOCUMENT_TYPES = [
        'dob_certificate' => [
            'db_field' => 'dimg',
            'status_field' => 'dyes',
            'suffix' => 'dob',
            'name' => 'DOB Certificate'
        ],
        'aadhar_card' => [
            'db_field' => 'aimg',
            'status_field' => 'ayes',
            'suffix' => 'adh',
            'name' => 'Aadhaar Card'
        ],
        'report_card' => [
            'db_field' => 'simg',
            'status_field' => 'ryes',
            'suffix' => 're',
            'name' => 'Report Card'
        ],
        'student_tc' => [
            'db_field' => 'tcimg',
            'status_field' => 'tcyes',
            'suffix' => 'tc',
            'name' => 'Student TC'
        ],
        'father_id_proof' => [
            'db_field' => 'fidimg',
            'status_field' => 'fidyes',
            'suffix' => 'fid',
            'name' => 'Father ID Proof'
        ],
        'mother_id_proof' => [
            'db_field' => 'midimg',
            'status_field' => 'midyes',
            'suffix' => 'mid',
            'name' => 'Mother ID Proof'
        ],
        'caste_certificate' => [
            'db_field' => 'castimg',
            'status_field' => 'ycast',
            'suffix' => 'caste',
            'name' => 'Caste Certificate'
        ],
        'admission_form' => [
            'db_field' => 'admimg',
            'status_field' => 'yadm',
            'suffix' => 'adm',
            'name' => 'Admission Form'
        ],
        'sssm_id' => [
            'db_field' => 'sssmid_img',
            'status_field' => 'sssmid_yes',
            'suffix' => 'sssmid',
            'name' => 'SSSM ID'
        ],
        'bank_passbook' => [
            'db_field' => 'bank_img',
            'status_field' => 'bank_yes',
            'suffix' => 'bank',
            'name' => 'Bank Passbook'
        ],
        'income_certificate' => [
            'db_field' => 'inc_img',
            'status_field' => 'inc_yes',
            'suffix' => 'inc',
            'name' => 'Income Certificate'
        ],
        'other_document' => [
            'db_field' => 'otimg',
            'status_field' => 'otyes',
            'suffix' => 'ot',
            'name' => 'Other Document'
        ]
    ];

    /**
     * Resolve document configuration by either its API name or database field
     */
    public static function resolveType($type) {
        $type = trim($type);
        if (isset(self::DOCUMENT_TYPES[$type])) {
            return self::DOCUMENT_TYPES[$type];
        }
        foreach (self::DOCUMENT_TYPES as $cfg) {
            if ($cfg['db_field'] === $type) {
                return $cfg;
            }
        }
        return null;
    }

    /**
     * Get target document directory path relative to this file
     */
    public static function getUploadDir() {
        return dirname(__DIR__) . '/school/document/';
    }

    /**
     * Get absolute URL path for a document file
     */
    public static function getDocumentUrl($filename) {
        if (empty($filename)) {
            return null;
        }
        
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || ($_SERVER['SERVER_PORT'] ?? 80) == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
        
        $apiDir = dirname($scriptName);
        $rootDir = dirname($apiDir);
        $rootDir = str_replace('\\', '/', $rootDir);
        if ($rootDir === '/') {
            $rootDir = '';
        }
        
        return $protocol . $domainName . $rootDir . '/school/document/' . rawurlencode($filename);
    }

    /**
     * Extract original filename by stripping the ERP student_id + suffix prefix
     */
    public static function getOriginalFilename($stored_filename, $student_id, $suffix) {
        if (empty($stored_filename)) {
            return null;
        }
        $prefix = $student_id . $suffix;
        if (strpos($stored_filename, $prefix) === 0) {
            return substr($stored_filename, strlen($prefix));
        }
        return $stored_filename;
    }

    /**
     * Compress image dynamically to fit size under 100 KB
     */
    public static function compressImage($sourcePath, $destinationPath, $maxSizeKB = 100) {
        $maxSizeBytes = $maxSizeKB * 1024;
        
        // If file is already smaller than max target size, copy directly
        if (filesize($sourcePath) <= $maxSizeBytes) {
            return copy($sourcePath, $destinationPath);
        }

        // Check if GD extension is enabled
        if (!extension_loaded('gd')) {
            throw new Exception("GD library is not enabled on server. Unable to compress images.");
        }

        $info = getimagesize($sourcePath);
        if ($info === false) {
            throw new Exception("Invalid image source file.");
        }

        $mime = $info['mime'];
        $width = $info[0];
        $height = $info[1];

        // Create GD resource
        switch ($mime) {
            case 'image/jpeg':
            case 'image/jpg':
                $image = imagecreatefromjpeg($sourcePath);
                break;
            case 'image/png':
                $image = imagecreatefrompng($sourcePath);
                break;
            case 'image/webp':
                $image = imagecreatefromwebp($sourcePath);
                break;
            default:
                throw new Exception("Unsupported format for compression: " . $mime);
        }

        if (!$image) {
            throw new Exception("Failed to load image resource.");
        }

        $quality = 85;
        $success = false;

        // Step 1: Compress quality recursively
        do {
            ob_start();
            if ($mime === 'image/png') {
                // PNG quality ranges 0-9. Quality 9 is max compression.
                $pngQuality = 9 - round(($quality / 100) * 9);
                imagepng($image, null, $pngQuality);
            } elseif ($mime === 'image/webp') {
                imagewebp($image, null, $quality);
            } else {
                imagejpeg($image, null, $quality);
            }
            $data = ob_get_clean();
            
            if (strlen($data) <= $maxSizeBytes) {
                file_put_contents($destinationPath, $data);
                $success = true;
                break;
            }
            $quality -= 10;
        } while ($quality >= 30);

        // Step 2: Scale dimensions if still too large
        if (!$success) {
            $maxWidth = 1200;
            $maxHeight = 1200;

            if ($width > $maxWidth || $height > $maxHeight) {
                $ratio = min($maxWidth / $width, $maxHeight / $height);
                $newWidth = round($width * $ratio);
                $newHeight = round($height * $ratio);

                $resizedImage = imagecreatetruecolor($newWidth, $newHeight);

                // Retain transparency for PNG/WEBP
                if ($mime === 'image/png' || $mime === 'image/webp') {
                    imagealphablending($resizedImage, false);
                    imagesavealpha($resizedImage, true);
                    $transColor = imagecolorallocatealpha($resizedImage, 255, 255, 255, 127);
                    imagefilledrectangle($resizedImage, 0, 0, $newWidth, $newHeight, $transColor);
                }

                imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                $quality = 75;
                do {
                    ob_start();
                    if ($mime === 'image/png') {
                        $pngQuality = 9 - round(($quality / 100) * 9);
                        imagepng($resizedImage, null, $pngQuality);
                    } elseif ($mime === 'image/webp') {
                        imagewebp($resizedImage, null, $quality);
                    } else {
                        imagejpeg($resizedImage, null, $quality);
                    }
                    $data = ob_get_clean();

                    if (strlen($data) <= $maxSizeBytes) {
                        file_put_contents($destinationPath, $data);
                        $success = true;
                        break;
                    }
                    $quality -= 15;
                } while ($quality >= 30);

                imagedestroy($resizedImage);
            }
        }

        imagedestroy($image);
        return $success;
    }
}
