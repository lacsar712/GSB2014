# 京剧艺术管理系统

一个基于 PHP + MySQL 的京剧艺术展示和管理网站，支持用户登录、京剧剧目的增删改查、图片放大查看等功能。

## 项目特点

- ✅ **用户认证系统**：账号密码登录，支持密码显示/隐藏
- ✅ **京剧管理**：完整的 CRUD 功能（增删改查）
- ✅ **图片展示**：点击图片可放大查看
- ✅ **精美界面**：现代化设计，响应式布局
- ✅ **Docker 部署**：一键启动，包含 PHP、MySQL、phpMyAdmin
- ✅ **拼音命名**：所有类名、变量名使用拼音
- ✅ **明文密码**：密码明文存储（仅用于学习演示）

## 技术栈

- **后端**：PHP 8.1 + Apache
- **数据库**：MySQL 8.0
- **前端**：HTML5 + CSS3 + JavaScript
- **部署**：Docker + Docker Compose

## 数据库设计

### 数据库名：wupengyuan

### 表结构

#### 1. yonghu（用户表）
```sql
- id: INT (主键，自增)
- zhanghao: VARCHAR(50) (账号，唯一)
- mima: VARCHAR(255) (密码，明文存储)
- chuangjianshijian: TIMESTAMP (创建时间)
```

#### 2. jingju（京剧表）
```sql
- id: INT (主键，自增)
- mingcheng: VARCHAR(100) (名称)
- jieshao: TEXT (介绍)
- tupian: VARCHAR(255) (图片文件名)
- chuangjianshijian: TIMESTAMP (创建时间)
- gengxinshijian: TIMESTAMP (更新时间)
```

## 快速开始

### 前置要求

- Docker
- Docker Compose

### 启动步骤

1. **克隆或进入项目目录**
```bash
cd /Users/tal/Desktop/PromptRepo/label-2014
```

2. **启动 Docker 容器**
```bash
docker-compose up -d
```

3. **等待服务启动**（约 30 秒）

4. **访问网站**
- 主网站：http://localhost:8014
- phpMyAdmin：http://localhost:8015

### 默认测试账号

| 账号 | 密码 |
|------|------|
| admin | admin123 |
| wupengyuan | 123456 |
| test | test123 |

## 项目结构

```
label-2014/
├── docker-compose.yml          # Docker 编排配置
├── Dockerfile                  # PHP 容器配置
├── init.sql                    # 数据库初始化脚本
├── README.md                   # 项目说明文档
└── src/                        # 源代码目录
    ├── index.php               # 登录页面
    ├── denglu_chuli.php        # 登录处理
    ├── shouye.php              # 首页
    ├── jingju_guanli.php       # 京剧管理页面
    ├── jingju_tianjia.php      # 添加京剧处理
    ├── jingju_bianji.php       # 编辑京剧处理
    ├── jingju_shanchu.php      # 删除京剧处理
    ├── tuichu.php              # 退出登录
    ├── css/
    │   └── style.css           # 样式文件
    ├── js/
    │   └── script.js           # JavaScript 文件
    └── images/                 # 图片目录
        ├── bawangbieji.jpg     # 霸王别姬
        ├── guifeiziujiu.jpg    # 贵妃醉酒
        └── default.jpg         # 默认图片
```

## 功能说明

### 1. 登录系统
- 账号密码验证（明文存储）
- 密码显示/隐藏切换
- 登录状态保持（Session）
- 错误提示

### 2. 首页
- 京剧艺术介绍
- 特色展示（脸谱、唱腔、服饰、武打）
- 数据统计
- 导航菜单

### 3. 京剧管理
- **查看**：网格布局展示所有京剧
- **添加**：模态框表单添加新京剧
- **编辑**：模态框表单编辑京剧信息
- **删除**：确认后删除京剧
- **图片放大**：点击图片可放大查看

### 4. 数据库连接
- 使用 `mysqli_connect()` 方式连接
- 变量名使用拼音：
  - `$lianjie` = mysqli_connect()
  - `$shujuku_fuwuqi` = 数据库服务器
  - `$shujuku_yonghuming` = 数据库用户名
  - `$shujuku_mima` = 数据库密码
  - `$shujuku_mingcheng` = 数据库名称

## 添加京剧图片

项目已包含两张示例图片。如需添加更多图片，请按以下步骤操作：

### 方法 1：手动添加图片

1. 将京剧图片文件放入 `src/images/` 目录
2. 确保文件名与数据库中的 `tupian` 字段匹配
3. 建议使用的文件名：
   - kongchengji.jpg（空城计）
   - muguiyingguashuai.jpg（穆桂英挂帅）
   - sanchakou.jpg（三岔口）
   - susanqijie.jpg（苏三起解）
   - dayushaijia.jpg（打渔杀家）
   - zhaoshiguier.jpg（赵氏孤儿）

### 方法 2：使用默认图片

如果某些图片暂时缺失，系统会自动显示 `default.jpg`（通过 `onerror` 属性）。

### 图片要求

- 格式：JPG、PNG
- 建议尺寸：800x600 像素或更高
- 内容：与京剧剧目相关的图片

## 端口说明

- **8014**：Web 服务器（PHP + Apache）
- **3314**：MySQL 数据库
- **8015**：phpMyAdmin 管理界面

## 停止服务

```bash
docker-compose down
```

## 完全清理（包括数据）

```bash
docker-compose down -v
```

## 数据库管理

### 使用 phpMyAdmin
1. 访问 http://localhost:8015
2. 服务器：db
3. 用户名：root
4. 密码：root123

### 使用命令行
```bash
docker-compose exec db mysql -uroot -proot123 wupengyuan
```

## 常见问题

### Q: 端口被占用怎么办？
A: 修改 `docker-compose.yml` 中的端口映射，例如将 `8014:80` 改为 `8016:80`

### Q: 图片不显示怎么办？
A: 
1. 检查图片文件是否存在于 `src/images/` 目录
2. 检查文件名是否与数据库中的记录匹配
3. 确保文件权限正确

### Q: 如何重置数据库？
A: 
```bash
docker-compose down -v
docker-compose up -d
```

### Q: 如何添加新用户？
A: 通过 phpMyAdmin 或命令行向 `yonghu` 表插入数据：
```sql
INSERT INTO yonghu (zhanghao, mima) VALUES ('newuser', 'password123');
```

## 安全提示

⚠️ **本项目仅用于学习演示**

- 密码明文存储不安全，生产环境请使用加密（如 password_hash）
- 建议在生产环境中使用 HTTPS
- 建议添加 CSRF 保护
- 建议添加 SQL 注入防护（已使用预处理语句）

## 开发说明

### 代码规范
- 所有类名、变量名使用拼音
- 数据库连接使用 `mysqli_connect()` 方式
- 使用预处理语句防止 SQL 注入
- 密码明文存储（仅用于演示）

### 文件命名
- PHP 文件：使用拼音，如 `denglu_chuli.php`
- CSS/JS：使用英文，如 `style.css`
- 图片：使用拼音，如 `bawangbieji.jpg`

## 许可证

本项目仅用于学习和演示目的。

## 作者

创建于 2026 年

---

**传承国粹 · 弘扬文化**
