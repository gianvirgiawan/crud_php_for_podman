FROM docker.io/library/mariadb:latest

COPY init.sql /docker-entrypoint-initdb.d/