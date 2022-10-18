#!/bin/sh

npm ci
npm test
npm run production

zip -r template.zip *.php *.css README.md assets screenshot.png template-parts
