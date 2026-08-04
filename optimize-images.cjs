const sharp = require('sharp');
const fs = require('fs');
const path = require('path');

const images = [
    'public/assets/people/michi.png',
    'public/assets/people/manuel.png',
    'public/assets/people/stevan.png',
    'public/assets/brand-logos/postgres.png',
    'public/assets/brand-logos/docker.png',
    'public/assets/brand-logos/react.png',
    'public/assets/brand-logos/python.png',
    'public/assets/brand-logos/tailwind.png',
    'public/assets/brand-logos/kubernetes.png',
    'public/assets/brand-logos/laravel.png',
    'public/assets/brand-logos/mysql.png',
    'public/assets/brand-logos/wordpress.svg',
    'public/assets/brand-logos/nextjs.svg',
    'public/assets/brand-logos/livewire.svg',
    'public/assets/form.png',
    'public/assets/team.png',
    'public/assets/about.png',
    'public/assets/contact-bg.png',
    'public/assets/rocket.png',
    'public/assets/websters-mobile.png',
    'public/assets/websters-full-logo.png',
    'public/assets/logo-jsonld.jpg',
    'public/assets/logo-og.jpg',
];

async function optimize() {
    for (const img of images) {
        const ext = path.extname(img).toLowerCase();
        const base = img.replace(ext, '');
        const webpPath = base + '.webp';
        
        try {
            if (ext === '.svg') {
                await sharp(img)
                    .webp({ quality: 85, effort: 6 })
                    .toFile(webpPath);
            } else {
                await sharp(img)
                    .webp({ quality: 85, effort: 6 })
                    .toFile(webpPath);
            }
            const origSize = fs.statSync(img).size;
            const webpSize = fs.statSync(webpPath).size;
            console.log(`✓ ${img} -> ${webpPath} (${Math.round(webpSize/origSize*100)}%)`);
        } catch (e) {
            console.log(`✗ ${img}: ${e.message}`);
        }
    }
}
optimize();