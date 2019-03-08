#!/bin/bash

git clone https://github.com/Laradock/laradock.git \
	&& cd laradock \
 	&& cp env-example .env \
	&& docker-compose up -d nginx mysql phpmyadmin redis workspace
