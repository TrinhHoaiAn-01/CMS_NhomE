-- Run in the WordPress database. Change wp_ here if the site uses another table prefix.
CREATE TABLE IF NOT EXISTS wp_widget_test_4_items (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(500) NOT NULL,
    url VARCHAR(500) NOT NULL,
    sort_order SMALLINT UNSIGNED NOT NULL DEFAULT 0,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    PRIMARY KEY (id),
    KEY sort_order (sort_order)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO wp_widget_test_4_items (id, title, description, url, sort_order, is_active) VALUES
(1, 'Tin Thế giới, thời sự quốc tế ...', 'Tin Thế giới - Đọc báo VnExpress cập nhật tin tức thế giới nóng ...', 'https://vnexpress.net/the-gioi', 1, 1),
(2, 'Tin tức 24h Mới nhất', 'Cập nhật tin tức 24/7: Thời sự, Giải trí, Thể thao, tại Việt Nam & Thế ...', 'https://vnexpress.net/tin-tuc-24h', 2, 1),
(3, 'Thể thao', 'Tin Thể Thao 24h mới nhất, bản tin thể thao 24/7 hôm nay, xem lịch ...', 'https://vnexpress.net/the-thao', 3, 1),
(4, 'Thời sự', 'Bản tin thời sự mới nhất 24h nóng trong ngày hôm nay. Các vấn ...', 'https://vnexpress.net/thoi-su', 4, 1),
(5, 'Pháp luật', 'Tin tức Pháp luật tại Báo VnExpress - Bản tin pháp luật ...', 'https://vnexpress.net/phap-luat', 5, 1)
ON DUPLICATE KEY UPDATE id = id;
