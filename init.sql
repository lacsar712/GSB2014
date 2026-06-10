-- 创建数据库
CREATE DATABASE IF NOT EXISTS wupengyuan DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE wupengyuan;

-- 创建用户表
CREATE TABLE IF NOT EXISTS yonghu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    zhanghao VARCHAR(50) NOT NULL UNIQUE,
    mima VARCHAR(255) NOT NULL,
    chuangjianshijian TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 创建京剧表
CREATE TABLE IF NOT EXISTS jingju (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mingcheng VARCHAR(100) NOT NULL,
    jieshao TEXT,
    tupian VARCHAR(255) NOT NULL,
    chuangjianshijian TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    gengxinshijian TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 插入测试用户（密码明文存储）
INSERT INTO yonghu (zhanghao, mima) VALUES 
('admin', 'admin123'),
('wupengyuan', '123456'),
('test', 'test123');

-- 插入京剧数据
INSERT INTO jingju (mingcheng, jieshao, tupian) VALUES 
('霸王别姬', '《霸王别姬》是京剧艺术的经典剧目之一，讲述了西楚霸王项羽和虞姬的爱情悲剧。该剧以其精湛的表演艺术和深刻的情感表达而闻名，是京剧旦角和老生行当的代表作品。剧中虞姬的剑舞和霸王的唱腔都是京剧艺术的精华所在。', 'bawangbieji.jpg'),
('贵妃醉酒', '《贵妃醉酒》是梅派代表剧目，展现了杨贵妃在百花亭醉酒的情景。该剧以优美的身段、华丽的服饰和细腻的表演著称，是京剧旦角艺术的巅峰之作。剧中贵妃的醉态、舞姿和唱腔完美结合，展现了京剧艺术的独特魅力。', 'guifeiziujiu.jpg'),
('空城计', '《空城计》取材于《三国演义》，讲述诸葛亮智退司马懿的故事。该剧是京剧老生行当的经典剧目，以唱功见长，展现了诸葛亮的智慧和从容。剧中诸葛亮在城楼抚琴的场景成为京剧舞台上的经典画面。', 'kongchengji.jpg'),
('穆桂英挂帅', '《穆桂英挂帅》讲述了杨门女将穆桂英五十三岁再度挂帅出征的故事。该剧是京剧旦角武戏的代表作，展现了穆桂英的英勇和智慧。剧中的武打场面精彩纷呈，唱腔慷慨激昂，是京剧艺术中刚柔并济的典范。', 'muguiyingguashuai.jpg'),
('三岔口', '《三岔口》是京剧武戏的经典剧目，以其精彩的武打设计而闻名。该剧讲述了焦赞、任堂惠在黑夜中误会交手的故事。全剧几乎没有唱腔，完全依靠演员的身段和武打技巧来表现黑夜摸索的场景，是京剧"夜战"戏的代表作。', 'sanchakou.jpg'),
('苏三起解', '《苏三起解》是程派代表剧目，讲述了名妓苏三被冤入狱后起解赴审的故事。该剧以其优美的唱腔和细腻的表演著称，展现了苏三的悲惨遭遇和坚强性格。剧中的"苏三离了洪洞县"是京剧中广为流传的经典唱段。', 'susanqijie.jpg'),
('打渔杀家', '《打渔杀家》讲述了渔民萧恩因女儿被恶霸欺凌而奋起反抗的故事。该剧是京剧老生和旦角的经典对手戏，展现了底层人民的反抗精神。剧中萧恩的唱腔苍凉有力，女儿萧桂英的表演细腻感人，是京剧现实主义题材的代表作。', 'dayushaijia.jpg'),
('赵氏孤儿', '《赵氏孤儿》是京剧悲剧的代表作，讲述了程婴舍子救孤的感人故事。该剧情节曲折，人物性格鲜明，展现了忠义精神。剧中程婴的唱腔深沉悲壮，是京剧老生行当的重要剧目，也是中国戏曲史上的经典悲剧。', 'zhaoshiguier.jpg');
