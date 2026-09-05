#!/usr/bin bash
# Local/dev entry only. NEVER blindly overwrites an existing .env:
# live .env files hold production secrets that env/.env.prod does not have.
if [ -f .env ] && [ "${1:-}" != "--force" ]; then
    echo "Refusing to overwrite existing .env (would destroy live secrets)."
    echo "Use './start.sh --force' only on a fresh local checkout."
    exit 1
fi
cp ./env/.env.prod .env

docker compose up -d --build
