#!/bin/bash

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

echo -e "${GREEN}=== Eerone WordPress Docker Setup ===${NC}\n"

# Check if Docker is installed
if ! command -v docker &> /dev/null; then
    echo -e "${RED}Error: Docker is not installed. Please install Docker first.${NC}"
    exit 1
fi

# Check if Docker Compose is installed
if ! command -v docker compose &> /dev/null; then
    echo -e "${RED}Error: Docker Compose is not installed. Please install Docker Compose first.${NC}"
    exit 1
fi

# Create .env file if it doesn't exist
if [ ! -f .env ]; then
    echo -e "${YELLOW}Creating .env file from .env.docker...${NC}"
    cp .env.docker .env
    echo -e "${GREEN}✓ .env file created${NC}\n"
else
    echo -e "${YELLOW}.env file already exists, skipping...${NC}\n"
fi

# Create wp-config.php file if it doesn't exist
if [ ! -f wp-config.php ]; then
    echo -e "${YELLOW}Creating wp-config.php from wp-config-docker.php...${NC}"
    cp wp-config-docker.php wp-config.php
    echo -e "${GREEN}✓ wp-config.php file created${NC}\n"
else
    echo -e "${YELLOW}wp-config.php file already exists, skipping...${NC}\n"
fi

# Stop any existing containers
echo -e "${YELLOW}Stopping any existing containers...${NC}"
docker compose down

# Start the containers
echo -e "${GREEN}Starting Docker containers...${NC}"
docker compose up -d

# Wait for database to be ready
echo -e "${YELLOW}Waiting for database to be ready...${NC}"
sleep 10

# Check if containers are running
if [ "$(docker ps -q -f name=eerone_wordpress)" ] && [ "$(docker ps -q -f name=eerone_db)" ]; then
    echo -e "${GREEN}✓ Containers are running successfully!${NC}\n"

    echo -e "${GREEN}=== Setup Complete ===${NC}\n"
    echo -e "WordPress Site: ${GREEN}http://localhost:9090${NC}"
    echo -e "WordPress Admin: ${GREEN}http://localhost:9090/wp-admin${NC}"
    echo -e "phpMyAdmin: ${GREEN}http://localhost:9091${NC}"
    echo -e "  Username: ${YELLOW}root${NC}"
    echo -e "  Password: ${YELLOW}root_password${NC}\n"

    echo -e "${YELLOW}Important Next Steps:${NC}"
    echo -e "1. Update site URLs in the database using phpMyAdmin or WP-CLI"
    echo -e "2. Run the following SQL in phpMyAdmin:"
    echo -e "   ${GREEN}UPDATE wphu_options SET option_value = 'http://localhost:9090' WHERE option_name = 'siteurl';${NC}"
    echo -e "   ${GREEN}UPDATE wphu_options SET option_value = 'http://localhost:9090' WHERE option_name = 'home';${NC}\n"

    echo -e "Or use WP-CLI (replace old-domain.com with your actual old domain):"
    echo -e "   ${GREEN}docker exec -it eerone_wordpress wp search-replace 'https://old-domain.com' 'http://localhost:9090' --allow-root${NC}\n"
    
    echo -e "View logs: ${GREEN}docker compose logs -f${NC}"
    echo -e "Stop containers: ${GREEN}docker compose down${NC}\n"
else
    echo -e "${RED}✗ Error: Containers failed to start. Check logs with: docker compose logs${NC}"
    exit 1
fi

