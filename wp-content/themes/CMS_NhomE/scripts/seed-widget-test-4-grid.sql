-- Run with mysql --default-character-set=utf8mb4 in the local WordPress database.
-- This site uses the wp_ prefix. The posts are dated before the earlier list widget's five sample posts.
INSERT INTO wp_posts (
    post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt,
    post_status, comment_status, ping_status, post_name, to_ping, pinged,
    post_modified, post_modified_gmt, post_content_filtered, guid, post_type
)
SELECT
    (SELECT MIN(ID) FROM wp_users),
    DATE_SUB('2026-09-24 12:00:00', INTERVAL seed.sort_order MINUTE),
    DATE_SUB('2026-09-24 12:00:00', INTERVAL seed.sort_order MINUTE),
    CONCAT('<p>', seed.summary, '</p>'), seed.title, seed.summary,
    'publish', 'closed', 'closed', seed.slug, '', '',
    DATE_SUB('2026-09-24 12:00:00', INTERVAL seed.sort_order MINUTE),
    DATE_SUB('2026-09-24 12:00:00', INTERVAL seed.sort_order MINUTE),
    '', '', 'post'
FROM (
    SELECT 1 AS sort_order, 'widget-test-4-grid-1' AS slug, 'Siết đăng kiểm xe sơ mi rơ moóc, vì sao gây tranh cãi?' AS title, 'Việc siết đăng kiểm xe sơ mi rơ moóc đang tạo ra nhiều ý kiến và câu hỏi.' AS summary
    UNION ALL SELECT 2, 'widget-test-4-grid-2', 'Cần gỡ vướng tách thửa đất tại TP.HCM', 'Những vướng mắc trong việc tách thửa đất tại TP.HCM cần được tháo gỡ.'
    UNION ALL SELECT 3, 'widget-test-4-grid-3', 'Thời tiết Tết Trung thu: 3 tỉnh mưa lớn dồn dập, có nơi trên 120 mm', 'Dịp Tết Trung thu, ba tỉnh có mưa lớn, có nơi ghi nhận lượng mưa trên 120 mm.'
    UNION ALL SELECT 4, 'widget-test-4-grid-4', 'Khổ sở ngược xuôi 10 năm trời xin cấp lại sổ đỏ vì bị đánh tráo', 'Một trường hợp phải đi lại nhiều năm để xin cấp lại sổ đỏ sau khi giấy tờ bị đánh tráo.'
    UNION ALL SELECT 5, 'widget-test-4-grid-5', 'Có bằng lái vẫn bị CSGT phạt lỗi không có bằng lái, vì sao?', 'Một trường hợp có bằng lái nhưng vẫn bị xử phạt lỗi không có bằng lái đang được đặt câu hỏi.'
    UNION ALL SELECT 6, 'widget-test-4-grid-6', 'AI làm nóng nghị trường LHQ', 'Trí tuệ nhân tạo trở thành chủ đề được chú ý tại nghị trường Liên Hợp Quốc.'
    UNION ALL SELECT 7, 'widget-test-4-grid-7', 'Tìm hướng xuống thang xung đột Nga – Ukraine', 'Các bên tìm hướng giảm căng thẳng trong xung đột Nga – Ukraine.'
    UNION ALL SELECT 8, 'widget-test-4-grid-8', 'Uống thuốc huyết áp, tim mạch nhiều năm: Vì sao không tự ý ngừng khi thấy khỏe?', 'Bài viết đặt câu hỏi về việc tự ý ngừng thuốc huyết áp, tim mạch khi cảm thấy khỏe.'
) AS seed
WHERE NOT EXISTS (
    SELECT 1 FROM wp_posts AS existing WHERE existing.post_type = 'post' AND existing.post_name = seed.slug
);

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
SELECT p.ID, '_widget_test_4_grid_order', SUBSTRING_INDEX(p.post_name, '-', -1)
FROM wp_posts AS p
WHERE p.post_type = 'post'
  AND p.post_name REGEXP '^widget-test-4-grid-[1-8]$'
  AND NOT EXISTS (
      SELECT 1 FROM wp_postmeta AS existing
      WHERE existing.post_id = p.ID AND existing.meta_key = '_widget_test_4_grid_order'
  );

UPDATE wp_posts
SET guid = CONCAT((SELECT option_value FROM wp_options WHERE option_name = 'home'), '/?p=', ID)
WHERE post_type = 'post' AND post_name REGEXP '^widget-test-4-grid-[1-8]$' AND guid = '';
