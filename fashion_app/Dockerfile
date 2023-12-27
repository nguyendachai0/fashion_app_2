# Use an official PHP image as the base image
FROM php:7.4-fpm

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the application files to the container
COPY . .

# Install any additional dependencies your application needs (e.g., git)
RUN apt-get update && apt-get install -y \
    git \
    # Add other dependencies here \
    && rm -rf /var/lib/apt/lists/*

# Expose the port that PHP-FPM will run on
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
