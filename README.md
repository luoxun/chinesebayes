#中文贝叶斯插件

###1. 简介
github上有很多老外的贝叶斯算法,但是中文分词和English 有明显的不同.so.抽空自己写了一个,分词服务的话,可以用文中的地址试验(求不要在生产环境) 我试了三方的分词服务,比较明显的一个词语是iphone6S这个单词,新浪的SAE分出来是iphone 和 6S 而其他很多分词服务都是iphone 6 S ,所以就用的新浪的分词服务,反正不贵 是吧.
	:-)
	

###.安装


**composer 安装**

```json
"require": {
    "luoxun/chinesebayes": "dev-master"
  },
```

###使用
#### 普通使用
 
#### laravel中使用
```php 
1. 学习
Bayes::train('good','罗技鼠标');
2. 分析
Bayes::guess('罗技'));
 
```

