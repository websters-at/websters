#!/bin/bash
set -e

images=(
    "public/assets/people/michi.png"
    "public/assets/people/manuel.png"
    "public/assets/people/stevan.png"
    "public/assets/brand-logos/postgres.png"
    "public/assets/brand-logos/docker.png"
    "public/assets/brand-logos/react.png"
    "public/assets/brand-logos/python.png"
    "public/assets/brand-logos/tailwind.png"
    "public/assets/brand-logos/kubernetes.png"
    "public/assets/brand-logos/laravel.png"
    "public/assets/brand-logos/mysql.png"
    "public/assets/brand-logos/wordpress.svg"
    "public/assets/brand-logos/nextjs.svg"
    "public/assets/brand-logos/livewire.svg"
    "public/assets/form.png"
    "public/assets/team.png"
    "public/assets/about.png"
    "public/assets/contact-bg.png"
    "public/assets/rocket.png"
    "public/assets/websters-mobile.png"
    "public/assets/websters-full-logo.png"
    "public/assets/logo-jsonld.jpg"
    "public/assets/logo-og.jpg"
)

for img in "${images[@]}"; do
    if [ ! -f "$img" ]; then
        echo "✗ $img (not found)"
        continue
    fi
    base="${img%.*}"
    webp="${base}.webp"
    
    # Get original size
    orig_size=$(stat -c%s "$img")
    
    # Convert to WebP with quality 85
    if [[ "$img" == *.svg ]]; then
        # SVG: render at 2x for crisp WebP, then compress
        convert -background none -density 300 "$img" -quality 85 -define webp:method=6 "$webp" 2>/dev/null
    else
        convert "$img" -quality 85 -define webp:method=6 "$webp" 2>/dev/null
    fi
    
    if [ -f "$webp" ]; then
        webp_size=$(stat -c%s "$webp")
        pct=$(( webp_size * 100 / orig_size ))
        echo "✓ $img -> $webp (${pct}%)"
    else
        echo "✗ $img (conversion failed)"
    fi
done
