<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
    <link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/Public/admin/css1/style.css">
    <script src="/Public/admin/js/jquery.js"></script>
</head>

<body style="background:#FFF8ED;margin:5px;">

	<div class="container">
		<div class="up">
			<div class="left">
				<div class="l_1">
					<p>考试场次：</p>
					<h3>科目一理论</h3>
				</div>
				<div class="l_2">
					<p>考生信息：</p>
					<dl>
						<dt><img src="/Public/admin/images/2.png" alt="无图"></dt>
						<dd>
							<ul>
								<li>考生姓名：<?php  echo $arr['stu_name']; ?></li>
								<li>性别： <?php  if ($arr['stu_sex']==1) {echo "男";}else{ echo "女";} ?> </li>
								<li>身份证号：<br>
								<?php  echo $arr['stu_idcard']; ?></li>
							</ul>
						</dd>
					</dl>
					
				</div>
				<div class="l_3">
					<p>离考试结束还有：</p>
					<h2>44分31秒</h2>
				</div>
			</div>
			<div class="right">
				<div class="r_1">
					<p>考试题目：</p>
					<H3>1.你可以从这个位置直接驶入高速公路行车道</H3>
					<img id="rightimg" src="/Public/admin/images/1.png" alt="无图">
					<h3 class="h3"><span>选择：<button id="yes">√</button><button id="no">×</button></span>您的答案：</h3>
				</div>
				<div class="r_2">
					<div class="r_2_1">
						<p id="blue">提示信息：</p>
						<p>判断题，请判断对错！</p>
					</div>
					<div class="r_2_2">
						
					</div>
					<p id="p"><button id="sub"><b>交卷</b></button><button id="stop"><b>暂停</b></button><button id="up"><b>上一题</b></button><button id="down"><b>下一题</b></button></p>
				</div>
			</div>
		</div>
		<div class="bottom">
			<ul>
				<li><a href="">1</a></li>
				<li><a href="">2</a></li>
				<li><a href="">3</a></li>
				<li><a href="">4</a></li>
				<li><a href="">5</a></li>
				<li><a href="">6</a></li>
				<li><a href="">7</a></li>
				<li><a href="">8</a></li>
				<li><a href="">9</a></li>
				<li><a href="">10</a></li>
				<li><a href="">11</a></li>
				<li><a href="">12</a></li>
				<li><a href="">13</a></li>
				<li><a href="">14</a></li>
				<li><a href="">15</a></li>
				<li><a href="">16</a></li>
				<li><a href="">17</a></li>
				<li><a href="">18</a></li>
				<li><a href="">19</a></li>
				<li><a href="">20</a></li>
				<li><a href="">21</a></li>
				<li><a href="">22</a></li>
				<li><a href="">23</a></li>
				<li><a href="">24</a></li>
				<li><a href="">25</a></li>
				<li><a href="">26</a></li>
				<li><a href="">27</a></li>
				<li><a href="">28</a></li>
				<li><a href="">29</a></li>
				<li><a href="">30</a></li>
				<li><a href="">31</a></li>
				<li><a href="">32</a></li>
				<li><a href="">33</a></li>
				<li><a href="">34</a></li>
				<li><a href="">35</a></li>
				<li><a href="">36</a></li>
				<li><a href="">37</a></li>
				<li><a href="">38</a></li>
				<li><a href="">39</a></li>
				<li><a href="">40</a></li>
				<li><a href="">41</a></li>
				<li><a href="">42</a></li>
				<li><a href="">43</a></li>
				<li><a href="">44</a></li>
				<li><a href="">45</a></li>
				<li><a href="">46</a></li>
				<li><a href="">47</a></li>
				<li><a href="">48</a></li>
				<li><a href="">49</a></li>
				<li><a href="">50</a></li>
				<li><a href="">51</a></li>
				<li><a href="">52</a></li>
				<li><a href="">53</a></li>
				<li><a href="">54</a></li>
				<li><a href="">55</a></li>
				<li><a href="">56</a></li>
				<li><a href="">57</a></li>
				<li><a href="">58</a></li>
				<li><a href="">59</a></li>
				<li><a href="">60</a></li>
				<li><a href="">61</a></li>
				<li><a href="">62</a></li>
				<li><a href="">63</a></li>
				<li><a href="">64</a></li>
				<li><a href="">65</a></li>
				<li><a href="">66</a></li>
				<li><a href="">67</a></li>
				<li><a href="">68</a></li>
				<li><a href="">69</a></li>
				<li><a href="">70</a></li>
				<li><a href="">71</a></li>
				<li><a href="">72</a></li>
				<li><a href="">73</a></li>
				<li><a href="">74</a></li>
				<li><a href="">75</a></li>
				<li><a href="">76</a></li>
				<li><a href="">77</a></li>
				<li><a href="">78</a></li>
				<li><a href="">79</a></li>
				<li><a href="">80</a></li>
				<li><a href="">81</a></li>
				<li><a href="">82</a></li>
				<li><a href="">83</a></li>
				<li><a href="">84</a></li>
				<li><a href="">85</a></li>
				<li><a href="">86</a></li>
				<li><a href="">87</a></li>
				<li><a href="">88</a></li>
				<li><a href="">89</a></li>
				<li><a href="">90</a></li>
				<li><a href="">91</a></li>
				<li><a href="">92</a></li>
				<li><a href="">93</a></li>
				<li><a href="">94</a></li>
				<li><a href="">95</a></li>
				<li><a href="">96</a></li>
				<li><a href="">97</a></li>
				<li><a href="">98</a></li>
				<li><a href="">99</a></li>
				<li><a href="">100</a></li>
			</ul>
		</div>
	</div>
</body>
</html>