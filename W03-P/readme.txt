<새로 배운 내용>
injection
: input시 생길 수 있는 문제로 임의의 sql문을 주입하고 실행하게 하여 유가 비정상적인 동작을 하는 행위. sql문으로 되어있는 입력값을 그대로 넣지 않고 의미 없는 단 순 문자열로 처리하도록 바꿔 해결. 전부 문자열이기 때문에 sql문인지 몰라 쿼리를 동작시키지 못함.
ex) mysqli_multi_query()를 이용해 들어오는 쿼리를 여러줄의 쿼리로 자동변환할 경우 편리하지만 보안적문제 존재
-> mysqli_real_escape_string()을 통해 input된 데이터 중 sql문으로 주입하는 공격에 사용될 수 있는 기호(ex: 주석기호)를 문자로 바꿈
‘title’ => mysqli_real_escape_string($link, $_POST[‘title’])


UPDATE
: UPDATE SET WHERE
<a href=”update.php?id=<?=$_GET[‘id’]?>”>update</a>
: update.php 뒤에 어떤 정보를 업데이트할 지 알려줘야하기 때문에 위의 경우에서는 id정보인 id=<?=$_GET[‘id’]?>를 값으로 넣었다.

if(isset($_GET[‘id’]))를 이용해 id 정보를 알 수 있을 때만 update link가 뜨도록 한다.
그 경우 update시에 id정보가 필요하기 때문에 hidden 타입으로 id정보를 숨겨서 추가한다.
<input type=”hidden” name=”id” value=”<?=$_GET[‘id’]?>”>

input은 1줄에 들어가는 것이라 값을 넣을 때는 ‘value’속성을 이용한다.
textarea는 별도 속성 없이 바로 넣을 수 있다.
ex) <input type=”text” name=”title” placeholder=”title” value=”<?=$article[‘title’]>”>
    <textarea name=”desc” placeholder=”desc”><?=$article[‘desc’]?></textarea>


DELETE
: DELETE FROM WHERE
settype()을 통해 변수를 어떤 type으로 바꿀지 설정가능.
settype($_GET[‘id’], ‘integer’)의 경우 id가 숫자가 아닌 값이 들어왔을 때를 대비해 숫자로 바꿈

process_delete.php에서는 삭제할 id를 mysqli_real_escape_string($link, $_GET[‘id’])로 받은 후 $query = “ DELETE FROM topic WHERE id={$filtered[‘id’]}”;로 지운다.

버튼형식은 제출’버튼’을 이용해 직접 사용자가 click하는 액션이 들어가지만 link형태로 만들 경우에는 악의적 방법으로 link를 타고가게끔 만들 수 있기 때문에 create, update, delete 기능 모두 버튼 형태(=form)로 제공해 주는 것이 조금 더 안전하게 정보를 보낼 수 있다.
ex)
$delete_link = '<a href=”process_delete.php?id=’.$_GET[‘id’].’”>delete</a>';
에서
$delete_link = '
<form action=”process_delete.php” method=”POST”>
<input type=”hidden” name=”id” value=”.$_GET[‘id’].”>
<input type=”submit” value=”delete”>
</form>
';
로 바꿔 링크형태에서 버튼형태로 변경되게 한다.

또 데이터은닉을 위해 GET방식으로 받았던 정보를 POST방식으로 받아 settype($_POST[‘id’], ‘integer’)로 바꾼다.

<문제가 발생하거나 고민한 내용>
=>를 =로 쓴다거나 정말 사소한 실수로 오류가 났다. 주의...

<참고할 만한 내용>
Injection: https://ko.wikipedia.org/wiki/SQL_%EC%82%BD%EC%9E%85
XSS: https://ko.wikipedia.org/wiki/%EC%82%AC%EC%9D%B4%ED%8A%B8_%EA%B0%84_%EC%8A%A4%ED%81%AC%EB%A6%BD%ED%8C%85
https://www.php.net/manual/en/function.htmlspecialchars.php

<회고>
+ : 전에는 오류 여부에만 급급했었지만 앞으로는 오류 뿐 아니라 보안에 대해 더 생각해봐야 할 것 같다.
- : 오류가 나서 query_log를 이용해 오류확인을 하려 했는데 익숙하지 않아 어떤 부분이 오류가 났는지 전혀 모르겠어서 오류가 날 법한 php파일을 계속 눈으로 확인해 오류를 수정한 부분이 아쉬웠다. 오류가 나도 정확하게 어떤 부분에서의 문법 오류가 났는지 친절하게 알려주는 언어들을 쓰다가 오류를 직접 찾다보니 시간이 굉장히 오래 걸렸다.
! : 정보처리기사 필기에서 SW개발 보안 구축 방면에서 입력 데이터 검증 및 표현 취약점의 대표가 XSS와 Injection이라고 외웠다. 이론으로 공부할 때는 단순하게 암기만 했는데 이번 수업에서 OWASP Top 10에 두가지가 나온 것을 보고 눈에 익어서 따로 찾아보았다.
XSS는 검증되지 않은 외부 입력 데이터를 웹페이지에 올려 타사용자가 해당 웹페이지 열람 시 웹페이지에 포함된 부적절한 스크립트가 실행되며 htmlspecialchars()를 통해 사전에 위험한 문자열을 제거하는 대책방법이 있다.
Injection은 공격자가 입력한 데이터에 대한 유효성을 점검하지 않아 DB쿼리 로직이 변경되어 정보유출 또는 DB의 변경을 가하는 공격으로 수업시간에 배운 mysqli_real_escape_string()을 통해 외부 입력이나 외부 변수로부터 받은 값을 파라미터화 된 질의문으로 사용하는 대책방법이 있다.
++ : 오늘 안 하면 내일은 다른 것 들까지 밀려서 더 하기 싫다는 생각으로 강의는 하루이틀 안에 듣기는 하지만 과제의 경우에는 남은 시간동안 더 공부하고 완벽하게 제출하겠다는 생각을 하다가 점점 미뤄져서 데드라인은 맞추지만 강의와는 다르게 수업 후 하루이틀 내에는 못하는 것 같다.

테스트동영상 : https://youtu.be/6aqwiEHAWek
