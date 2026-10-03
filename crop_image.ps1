Add-Type -AssemblyName System.Drawing
$img = [System.Drawing.Image]::FromFile('d:\Code\menu.wegeni.com\public\assets\images\realtime-access-ui.png')
$w = $img.Width
$h = $img.Height
Write-Host "Image Dimensions: $w x $h"

# Crop the right visual (approx 45% to 100% width)
$cropX = [int]($w * 0.44)
$cropW = $w - $cropX
$cropRect = New-Object System.Drawing.Rectangle $cropX, 0, $cropW, $h

$bmp = New-Object System.Drawing.Bitmap $cropW, $h
$g = [System.Drawing.Graphics]::FromImage($bmp)
$g.InterpolationMode = [System.Drawing.Drawing2D.InterpolationMode]::HighQualityBicubic
$g.SmoothingMode = [System.Drawing.Drawing2D.SmoothingMode]::HighQuality
$g.DrawImage($img, (New-Object System.Drawing.Rectangle 0, 0, $cropW, $h), $cropRect, [System.Drawing.GraphicsUnit]::Pixel)

$g.Dispose()
$img.Dispose()

$bmp.Save('d:\Code\menu.wegeni.com\public\assets\images\realtime-access-right-visual.png', [System.Drawing.Imaging.ImageFormat]::Png)
$bmp.Dispose()

Write-Host "Successfully saved realtime-access-right-visual.png!"
