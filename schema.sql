CREATE DATABASE IF NOT EXISTS motocycle;

USE motocycle;

CREATE TABLE motos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(255) NOT NULL,
    model VARCHAR(255) UNIQUE NOT NULL,
    type VARCHAR(255) NOT NULL,
    price FLOAT NOT NULL,
    image VARCHAR(255) DEFAULT ''
) ENGINE = InnoDB;

INSERT INTO
    motos (
        brand,
        model,
        type,
        price,
        image
    )
VALUES (
        'Honda',
        'CB650R',
        'Enduro',
        7490,
        '/img/honda-cb650r.jpg'
    ),
    (
        'Ducati',
        'Scrambler 800',
        'Roadster',
        8990,
        '/img/ducati-scrambler800.jpg'
    ),
    (
        'Royal Enfield',
        'Interceptor 650',
        'Custom',
        5990,
        '/img/royalenfield-interceptor650.jpg'
    ),
    (
        'Kawasaki',
        'Z900',
        'Sportive',
        9390,
        '/img/kawasaki-z900.jpg'
    ),
    (
        'Yamaha',
        'MT-07',
        'Roadster',
        7390,
        '/img/yamaha-mt07.jpg'
    ),
    (
        'Suzuki',
        'V-Storm 650XT',
        'Enduro',
        8890,
        '/img/suzuki-vstorm650xt.jpg'
    );