#!/bin/bash

git clone https://github.com/Laradock/laradock.git . \
 	&& cp env-example .env \
	&& docker-compose up -d nginx mysql phpmyadmin redis workspace
