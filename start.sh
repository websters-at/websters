#!/usr/bin bash
cp ./env/.env.prod .env

docker compose up -d --build
