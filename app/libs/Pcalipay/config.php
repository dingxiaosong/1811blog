<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016100100638393",

		//商户私钥
		'merchant_private_key' => "MIIEpAIBAAKCAQEA7P8UrCs02y/IMo7nyeWuqI9cpYb2I3MiM8gDiSiUK4sNOxOBrFczO/fi5KgdXEYuJqTYOz8+JYJ0kZv/VixWmFMVMKUEwXrzmOnGFOEop3NrzK8lks3ada7nTVlf04GbYnWcPoGuCdxPJKA7kZKtxqssuL1Lp8BhQhPkU6VdFfiXQy+0eiUqzZk686TSNJAFtMuEZHqJwL8lyXWfLRQH6twRm5jZRJPlFfeQRmqb9evqukDrretDu6X9gQQclAsLGTZZDg7fCfBQtviiUB4NCZYnWJNv91PJwH4NAqwRDudUruhPd/zTY+AxsCymgigO+5lUkvzIgAwB3hwR+t1ZywIDAQABAoIBAEJ85X3PuUpsw0t70AdSSoe7gJBnppIXcNb6HBPUsIzuu82BEXYaGKOQTbU8fNAwWC47PPaSLYs0aCOZki7IzZp6ZI17HjRxm/mgTBP7fv5LYUjRMkdXPRya7wVCN6IM0Fz1Bdp7YyodBo8N7OhQMDR2PVuur5TmYeK51eqpj83jn8Wc7NkhrSmMoz5B5ptNmNp5o6lPVr9YtLnFiwa18x9/Ldl8/rj9qfUKP/mlLfzk47Vld3dC9Fm9isBc1HHfI+LuH8mgcxHcTYIt240ZZIGnM0SkHhAiczQWZcI+6b9PNGodpPKmZVjTEgWiATb86uIR2GIDLU0HbM9F9kExgNECgYEA+LJZHPEqLQ1O9xCDTVCMPGUXOBeOaJ2bCq254916CoVvb4SAnJDsjSvAu5x0kdeV28f3WD8v1jUpFVV1LvcYghhCdaWh5K5FhC5Ztpo/Apo4gIF2rsnGKyKPwbxtI6ZBfyKE2VjKpaxUFGuXQfHfkOWsuKafM0HJ8vHYdnCjs8cCgYEA8/TFvOfD57wWg4+9gewPUB52pGyD3lJ2DzX9VCk+AzlWgPFSb1stcVRkmPX3060Rr1e/G3TTKLufPFqSAgsPsdOsQU/49N4rEoHVuloLr3iknyD4y0FRT8YXl/wUQ/R7yePM4Fro4nTnKcL0QbZ84ALBU/7rAEHlW2G9slStod0CgYEAknF61fcQrcy7ZfKcTqeSnHGulYIRgnrj9ArOfmZJWe6u6szsasVP9eUArbj4T3TSMsPyW02B3rIZCg3zXf90uA6O+/XXefBA0Q/2FfeICQFFKi6R82SvQ3Erk5pf7fEVekaaUd3eHmZ2cDvWqqdBzXHhHi5Haohf4aYVn9C+JLsCgYEAvxFpwc+AB0KwG3B8C4LYZ3bEk3kOOxU4tCcj90Op9xp0Xt8jImY2DDn95DNZW+eEH2HJIvb330I7sCh7jLAfJbbUhf7dzOMotwELZT3bQx5pSNypH4BT7/gFSJs9QA/+2BvbvahWF+9ZkcLITaNg4I4n3uKcKgJyYYUG7uIVb90CgYA6P228svJ+asTpqvQ5YStLDpVBfezqbTcVdC4Ba3TFHScydPtRu1VyfoSq28Ipe2wByaHQzmx7I9RLMAE9E+gi3/YvxE1T7KzBBz3QMGemGGPFgn8mC/YcfngQQhiqo/zrjyFLxGX/UlAvPpIgNAzwatA9TgHJ1FNHLzGdLshrSA==",
		
		//异步通知地址
		'notify_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://www.laravel.com/returnpay",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",
		

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA2senc8DTOsy+TnM6gBcMchz2+LYMf8hFyAgeQOBjqb3C94nFV4TFfszKPyMGEQaQjG5jkvUyREoDmK5mQ8M5UX5P6Pl+8mIOghLqvOMM2lD94Tf087UnUy68tGdS7hvHS0P+ANsifi1B97qdLjOEjDSewcHY9BOe+XdR/7itXl6C8CijGcDuRD6Z5bBIDMcnz9GjmprnxCM5lixYkz9KNubmnxVL0NZ/JilaWR0PafjRlFN4EUgGk1ABeLZLxkgqR7WWjQCogLQaWfM2CsAbJCMo1BjlSLHLA7yRFVk611PjsG7i7znU0f6FDh/zZHrmrRhgvUXMIDUnOA/4KC0/RwIDAQAB",
);