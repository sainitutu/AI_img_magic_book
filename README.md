# AI_img_magic_book
簡易AI咒語收集
# 環境
* php
* mysql
# 安裝方法
* 整個打包放到php上
* 在database.php填寫mysql的資料
#使用方法
* imgshow.php為展示資料
* img_add.php為新增工具

打開對應網頁就能直接使用

# 資料庫欄位
* id：自動累加數字，分辦圖為哪一個咒語
* img_name：咒語標題
* Prompt：正向咒
* Negative：反向咒
* img_h：圖高
* img_w：圖寬
* steps：算圖次數
* scale：cfg scale
* model：模型
* program：程式(大多為stable-diffusion-webui或naifu)
* Sampling_method：抽樣方法(我愛用ddim)
* provider：提供者
* r：咒法等級(懂的才懂)
* Remark：註釋
* open：是否開發顯示(0不開 1開)
#其他
* 網址後加上?r=[等級] 會有新天地
