#!/bin/bash
# start-fodrasz-clean.sh
# Teljes tisztítás: konténerek, volume-ok, hálózatok és image-ek törlése

echo "=== Stopping and removing all containers ==="
docker rm -f $(docker ps -aq) 2>/dev/null || true

echo "=== Removing all volumes ==="
docker volume rm $(docker volume ls -q) 2>/dev/null || true

echo "=== Removing all networks ==="
docker network rm $(docker network ls -q) 2>/dev/null || true

echo "=== Removing all images ==="
docker rmi -f $(docker images -q) 2>/dev/null || true

echo "=== Starting Docker Compose ==="
docker compose up -d --build

echo "=== Done! Containers are running ==="
docker ps
