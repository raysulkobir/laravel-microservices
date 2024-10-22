# Laravel Microservices (Main Repository)

## Description
This repository serves as the umbrella project for managing multiple Laravel microservices. It includes shared configurations, documentation, deployment scripts, and Docker configurations that apply to all services. Each service is maintained as an independent repository.

## Repository Name: `laravel-microservices`

### Contains:
- **API Gateway**: For routing requests to the services.
- **Docker Compose Configurations**: To run services together.
- **Documentation**: Explains the microservice architecture, CI/CD pipeline, and the overall project overview.
- **API Documentation**: For detailed API documentation, refer to the Postman Documentation or generated OpenAPI specs.

---

## User-Service

### Description
The `user-service` handles all user-related functionality, including user registration, authentication, profile management, and role-based access control.

### Repository Name: `user-service`

### Key Features:
- User registration and login API endpoints.
- JWT-based authentication (via Laravel Passport or Sanctum).
- Role and permission management (using Laravel’s built-in authorization features).
- Token verification service.

### Endpoints:
- **POST /api/auth/register**: Registers a new user.
- **POST /api/auth/login**: Authenticates a user and returns a token.
- **POST /api/auth/verify-token**: Verifies the validity of a token.

---

## Brand-Service

### Description
The `brand-service` manages CRUD operations for brands, handling the creation, updating, retrieval, and deletion of brand-related information.

### Repository Name: `brand-service`

### Key Features:
- CRUD operations for managing brands.
- Integration with the API Gateway for access control and routing.

### Endpoints:
- **GET /api/brands**: Fetches all brands.
- **POST /api/brands**: Creates a new brand.
- **GET /api/brands/{id}**: Retrieves details of a specific brand.
- **PUT /api/brands/{id}**: Updates an existing brand.
- **DELETE /api/brands/{id}**: Deletes a brand.

---

## Folder Structure for Services
Each service (e.g., `user-service`, `brand-service`) should follow a similar folder structure for consistency:

```bash
/app
  ├── Http
  │   ├── Controllers
  │   └── Middleware
  ├── Models
  ├── Services
/config
/routes
  └── api.php
/resources
  └── views
composer.json
.env
