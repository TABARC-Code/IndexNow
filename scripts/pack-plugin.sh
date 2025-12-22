#!/usr/bin/env bash
set -e

VERSION=$(grep "Version:" indexnow.php | awk '{print $2}')
zip -r "IndexNow-${VERSION}.zip" . -x ".git/*" ".github/*" "scripts/*"
