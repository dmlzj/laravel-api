* Laravel api整理
** jwt多用户配置
- 实现多用户登录验证
- 前端接收到数据后判断返回的header里面是否带有Authentication字段,有代表token过期了,要把这个字段的值更新到本地token中
** 请求列表统一封装请求参数
- 参考网址: https://github.com/selahattinunlu/laravel-api-query-builder
- limit,order_by,include,page,columns随便传,还有过滤条件请参考上面网址文档
** dingo api配置
- 方便控制版本
** 事件系统
- 默认执行事件是同步的
- 可以通过事件队列实现异步执行
** 队列
- 队列是异步的

- 队列任务监听服务管理命令,将下面命令放到supervisor配置文件中(/etc/supervisor/conf.d/),命名为laravel-work.conf
#+BEGIN_SRC shell
[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /home/dmlzj/www/php/xiaoyuan-api/artisan queue:work redis --sleep=3 --tries=3
autostart=true
autorestart=true
user=dmlzj
numprocs=8
redirect_stderr=true
stdout_logfile=/home/dmlzj/www/php/xiaoyuan-api/worker.log
#+END_SRC

- supervisor启动进程命令,如果文件变动影响队列任务,那么需要重启它:
#+BEGIN_SRC SHELL
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start laravel-worker:*
sudo supervisorctl restart laravel-worker:*
#+END_SRC
