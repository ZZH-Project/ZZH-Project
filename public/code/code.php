<?php
	/**
	 *@param int $length 表示验证码字符的个数
	 *@param int $font 表示字体的大小
	 *@param bool $flag 用何种验证码，1表示英文，2表示中文，3表示计算
	 */
	function virify($length, $font = 20, $flag = 3)
	{
		//开启session
		session_start();
		//根据字符的个数，得到画布的长度
		$width = 127.547;
		//得到画布的高度
		$height = 52;
		//创建画布
		$resouce = imagecreatetruecolor($width, $height);
		//分配颜色
		$white = imagecolorallocate($resouce, 233, 233, 233);
		$black = imagecolorallocate($resouce, 0, 0, 0);
		//填充颜色
		imagefill($resouce, 0, 0, $white);
		//定义一个英文字符串
		$str = "ABCDFGHJKLMNPQRSTUVWXYabcdefjhkmnpqrstuvwxy234356789";
		//定义中文字符串
		$strZh = "赵钱孙李周吴郑王冯陈楮卫蒋沈韩杨朱秦尤许何吕施张孔曹严华金魏陶姜戚谢邹喻柏水窦章云苏潘葛奚范彭郎鲁韦昌马苗凤花方俞任袁柳酆鲍史唐费廉岑薛雷贺倪汤乐于时傅皮卞齐康";
		//填充字符
		//判断是否采用中文
		if ($flag == 2) {
			//中文验证码
			for ($i = 0; $i < $length; $i ++) {
				$code[$i] = mb_substr($strZh, mt_rand(0, mb_strlen($strZh, 'utf-8')-1), 1, 'utf-8');
				imagettftext($resouce, $font, mt_rand(-20, 20), $i*$font + 10, $height / 2 + 10, $black, './fonts/STKAITI.TTF', $code[$i]);
			}
			//保存数据到session中
			$_SESSION['code'] = strtolower(implode($code));
		} elseif ($flag == 1) {
			//英文字符验证码
			//循环输出字符
			for ($i = 0; $i < $length; $i ++) {
				//随机得到字符
				$code[$i] = $str{mt_rand(0, strlen($str) - 1)};
				imagettftext($resouce, $font, mt_rand(-20, 20), $i*$font, 25, $black, './fonts/consola.ttf', $code[$i]);
			}
			//保存数据到session中
			$_SESSION['code'] = strtolower(implode($code));
		} elseif ($flag == 3) {
			// 随机两个数字
			$num1 = mt_rand(0,99);
			$num2 = mt_rand(0,99);
			//运算符
			$match = '+';
			$echo = '=';
			$what = '?';
			$code = $num1 + $num2;
			//随机颜色
			$color = imagecolorallocate($resouce, mt_rand(0, 200), mt_rand(0, 200), mt_rand(0, 200));
			$color1 = imagecolorallocate($resouce, mt_rand(0, 200), mt_rand(0, 200), mt_rand(0, 200));
			$color2 = imagecolorallocate($resouce, mt_rand(0, 200), mt_rand(0, 200), mt_rand(0, 200));
			imagettftext($resouce, $font, mt_rand(-20, 20), 0.5*$font, 35, $color, './fonts/Gabriola.ttf', $num1);
			imagettftext($resouce, $font, 0, 1.8*$font, 35, $black, './fonts/Gabriola.ttf', $match);
			imagettftext($resouce, $font, mt_rand(-20, 20), 2.5*$font, 35, $color1, './fonts/Gabriola.ttf', $num2);
			imagettftext($resouce, $font, 0, 3.7*$font, 35, $black, './fonts/Gabriola.ttf', $echo);
			imagettftext($resouce, $font, mt_rand(-20, 20), 4.5*$font, 35, $color2, './fonts/Gabriola.ttf', $what);
			//保存数据到session中
			$_SESSION['code'] = $code;
		}
		//绘制杂点
		for ($i = 0; $i < 50; $i ++) {
			//随机颜色
			$color = imagecolorallocate($resouce, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
			//绘制点
			imagesetpixel($resouce, mt_rand(0, $width), mt_rand(0, $height), $color);
		}
		//绘制杂线
		for ($i = 0; $i < 6; $i ++) {
			//随机颜色
			$color = imagecolorallocate($resouce, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
			//绘制线
			imageline($resouce, mt_rand(0, $width), mt_rand(0, $height), mt_rand(0, $width), mt_rand(0, $height), $color);
		}
		//输出画布
		header('Content-type:image/jpeg');
		imagejpeg($resouce);
	}
	virify(5, 25);