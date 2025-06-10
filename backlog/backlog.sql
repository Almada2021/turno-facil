CREATE DATABASE reservations;

use reservations;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created DATETIME,
    modified DATETIME
);

CREATE TABLE business (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    address VARCHAR(255),
    phone VARCHAR(30),
    email VARCHAR(100),
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabla de relación entre usuarios y negocios (muchos a muchos)
CREATE TABLE user_business (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    business_id INT NOT NULL,
    role ENUM('owner', 'employee') NOT NULL DEFAULT 'employee',
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    -- Claves foráneas
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (business_id) REFERENCES business(id) ON DELETE CASCADE,
    -- Índice único para evitar duplicados
    UNIQUE KEY unique_user_business (user_id, business_id)
);

-- -- Crear índices para mejor rendimiento
-- CREATE INDEX idx_user_business_user_id ON user_business(user_id);
-- CREATE INDEX idx_user_business_business_id ON user_business(business_id);
-- CREATE INDEX idx_user_business_role ON user_business(role);
-- -- Ejemplos de consultas útiles:
-- -- 1. Obtener todos los negocios de un usuario específico
-- SELECT
--     b.*,
--     ub.role
-- FROM
--     business b
--     INNER JOIN user_business ub ON b.id = ub.business_id
-- WHERE
--     ub.user_id = 1;
-- -- 2. Obtener todos los empleados de un negocio específico
-- SELECT
--     u.*,
--     ub.role
-- FROM
--     users u
--     INNER JOIN user_business ub ON u.id = ub.user_id
-- WHERE
--     ub.business_id = 1;
-- -- 3. Obtener solo los dueños de un negocio
-- SELECT
--     u.*,
--     ub.role
-- FROM
--     users u
--     INNER JOIN user_business ub ON u.id = ub.user_id
-- WHERE
--     ub.business_id = 1
--     AND ub.role = 'owner';
-- -- 4. Verificar si un usuario es dueño de algún negocio
-- SELECT
--     COUNT(*) as total_businesses_owned
-- FROM
--     user_business
-- WHERE
--     user_id = 1
--     AND role = 'owner';
-- -- 5. Obtener negocios donde el usuario es empleado
-- SELECT
--     b.*,
--     ub.role
-- FROM
--     business b
--     INNER JOIN user_business ub ON b.id = ub.business_id
-- WHERE
--     ub.user_id = 1
--     AND ub.role = 'employee';
-- -- Ejemplos de INSERT:
-- -- Insertar un negocio
-- INSERT INTO
--     business (name, description, address, phone, email)
-- VALUES
--     (
--         'Mi Restaurante',
--         'Restaurante de comida casera',
--         'Calle Principal 123',
--         '555-0123',
--         'info@mirestaurante.com'
--     );
-- -- Asociar un usuario como dueño de un negocio
-- INSERT INTO
--     user_business (user_id, business_id, role)
-- VALUES
--     (1, 1, 'owner');
-- -- Asociar un usuario como empleado de un negocio
-- INSERT INTO
--     user_business (user_id, business_id, role)
-- VALUES
--     (2, 1, 'employee');
CREATE TABLE plans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price INT NOT NULL,
    duration ENUM('monthly', 'yearly') NOT NULL DEFAULT 'monthly',
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO
    plans (name, price, duration)
VALUES
    ('Free Plan', 0, 'monthly'),
    ('Lite Plan', 200000, 'monthly'),
    ('Standard Plan Monthly', 400000, 'monthly'),
    ('Standard Plan Yearly', 4000000, 'yearly');

-- Migrate
CREATE TABLE subscriptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    plan_id INT NOT NULL,
    start_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    end_date DATETIME,
    status ENUM('active', 'inactive', 'cancelled') NOT NULL DEFAULT 'active',
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    -- Claves foráneas
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (plan_id) REFERENCES plans(id) ON DELETE CASCADE
);

-- Migrate
CREATE TABLE plan_limits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    plan_id INT NOT NULL,
    accessor TEXT NOT NULL,
    -- Claves foráneas
    FOREIGN KEY (plan_id) REFERENCES plans(id) ON DELETE CASCADE
);