USE honvivo;

ALTER TABLE eventos ADD COLUMN facebook VARCHAR(250) COLLATE utf8mb4_spanish2_ci NULL;

ALTER TABLE eventos ADD COLUMN destacado tinyint(1) DEFAULT 0;