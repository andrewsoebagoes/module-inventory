CREATE TABLE inventory_units (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE inventory_items(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    unit_id INT NOT NULL,
    record_type VARCHAR(100) NOT NULL,
    status VARCHAR(100) NOT NULL,
    CONSTRAINT fk_inventory_unit_id FOREIGN KEY (unit_id) REFERENCES inventory_units(id) ON DELETE CASCADE
);

CREATE TABLE inventory_item_logs(
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_id INT NOT NULL,
    amount INT NOT NULL,
    organization_src_id INT NOT NULL,
    organization_dst_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_inventory_item_id FOREIGN KEY (item_id) REFERENCES inventory_items(id) ON DELETE CASCADE,
    CONSTRAINT fk_inventory_oranization_src_id FOREIGN KEY (organization_src_id) REFERENCES organizations(id) ON DELETE CASCADE,
    CONSTRAINT fk_inventory_oranization_dst_id FOREIGN KEY (organization_dst_id) REFERENCES organizations(id) ON DELETE CASCADE

);
