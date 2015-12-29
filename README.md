codepencil v0.1 前端代码分享平台   
===========================  

### 简介  

#### 主要功能
 codepencil 是一个前端代码分享平台网站，用于在线编辑前端内容和实时预览，分享自己的内容。该网站仅供学习使用。
网站第一版开发仓促只有一个礼拜的时间，所以仅简单的完成了基本的内容，扩展功能并没有实现。网站逻辑在仓促的情况下也没有很好的完善。
代码也金能够使用而已，并没有进行优化。后台采用thinkphp框架实现，前端直接使用flex布局，less和jquery，利用gulp完成的自动化测试。
其中过多的冗余内容也没有剔除，期待改进。    
#### 参与开发者  

前端部分：   [@CaelumTian](https://github.com/T-phantom),  [@M-Withershins](https://github.com/M-Withershins), [@Jorten](https://github.com/5606595)    
PHP后端部分：[@hbxtben](https://github.com/hbxtben)   

### 问题和改进  

#### 前端部分  
1. js部分扩展维护性很差，需要重构，将不同模块部分分离出来便于二次使用。  
2. editor的逻辑要重新设计，简化。  
3. 添加`localstorage`支持，以免代码忘记保存而丢失。 
4. code页面javascript部分需要重新设计，目前性能有问题。大量js的代码会造成页面卡顿。  
5. 网站移动端的响应式部分需要完善  
6. 完善功能  
7. 抛弃jquery框架，改用MVVM框架（待定）

#### 后端部分：  
1. 逻辑需要重新设计，数据库要重新设计，当前版本纯是为了应付。  
2. 添加`监控`和`单元测试`等内容。  
3. 首评优化。    
4. PHP版本是否还要保留待定  

### 下版本变更    
#### codepencil v0.2 开发中
1. 更换后端语言为`NodeJS`  
2. 更换前端框架  
3. 添加完善个人用户界面  
4. 添加代码片段编辑分享界面  
5. 添加博客等其他内容编写界面  
6. 添加评论功能  
7. 添加优化搜索  
8. 添加后台监控等功能
9. 添加更多的代码框架支持（less, sass, jade, react, angularjs等） 
10. 其他内容......   

### PHP 版目录结构（v0.1）
>--codepencil  构建目录
>>--conf  配置文件

>>--Home  项目源代码  
  
>>>--Common 公共文件  

>>>--Controller 控制器文件  

>>>--View 视图文件 

>>--Runtime 运行时缓存  

>-- Public 静态文件存  

>--ThinkPHP  ThinkPHP框架代码

>--index.php 入口文件  

>--template.html 代码编辑模板
