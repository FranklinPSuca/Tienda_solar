<?php
function uploadImage(array $file, string $destFolder): ?string {
    if (empty($file) || $file['error'] !== UPLOAD_ERR_OK) return null;
    $allowed = ['image/jpeg','image/png','image/webp'];
    if (!in_array($file['type'], $allowed)) return null;
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $name = uniqid('p_') . '.' . $ext;
    if (!is_dir($destFolder)) mkdir($destFolder, 0755, true);
    $dest = rtrim($destFolder, '/') . '/' . $name;
    if (move_uploaded_file($file['tmp_name'], $dest)) return $name;
    return null;
}
