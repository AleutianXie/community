# community

# 部署（Windows）
1. 安装composer
2. 安装依赖库 or 升级依赖库
```shell
composer install or composer update
```
3. 创建数据库(community)
4. 导入数据表
```shell
php artisan migrate
```
5. 导入用户数据（管理员）
```shell
php artisan db:seed --class=UsersTableSeeder
```
6. 导入物业公司数据
```shell
php artisan db:seed --class=PropertiesTableSeeder
```
7. 导入小区数据
```shell
php artisan db:seed --class=ArchivesTableSeeder
```
8. 导入小区图纸信息
```shell
php artisan db:seed --class=PhotosTableSeeder
```