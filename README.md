# 課題07
「アーセナル移籍情報登録(改良版)」

## 課題内容（どんな作品か）
 - サッカーチーム「アーセナル」へ移籍する可能性のある選手を登録する

## 工夫した点・こだわった点
 - ログイン機能追加
 - ログインするとnav部分と左カラムに名前と年齢を条件分岐で表示できるようにした
 - プロフィール画像の登録
 - プロフィールの修正機能
 - 選手登録情報の更新・削除機能
 - 更新情報をテロップ風に表示
 - レイアウトをキレイに整えた

## 質問・疑問・残課題
 - いいね機能の実装→Laravelを学習して実装を試したい
 - 更新情報のバーの右隣に謎の数字「1」が出現したが消すことが出来なかった
 - フォルダの整理→ファイルが多くなり混乱してしまうので良い整理方法を模索したい
 
## その他（感想、シェアしたいことなんでも）
アーセナル好きの「グーナー」なので、試合結果の表示など色々充実させていきたいと考えております。
テーブルが増えると「id」も増え、さらに「セッションid」も加わりどのidを処理しているか混乱してしまい作業に時間がかかりました
またページが増えると、一つのページを直すと全てのページを直す作業が発生しかなりの時間を要しました。
同じコードは共通ファイルに書くなどページ更新作業時の効率の良い方法を考えたい。

## 課題のイメージ
![localhost_kadai_07_login php](https://user-images.githubusercontent.com/83898546/124339932-9c8a3480-dbec-11eb-9305-1b7690cc48cf.png)
![localhost_kadai_07_index php](https://user-images.githubusercontent.com/83898546/124339934-a1e77f00-dbec-11eb-8585-d2d73042902c.png)
![localhost_kadai_07_transfer php](https://user-images.githubusercontent.com/83898546/124339938-a4e26f80-dbec-11eb-90b3-7d5b2fcd3ce7.png)
![localhost_kadai_07_profile php_id=1](https://user-images.githubusercontent.com/83898546/124339943-a90e8d00-dbec-11eb-90ea-8450b368890e.png)
