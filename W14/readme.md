# 새로 배운 내용

```
* RDBMS(: Relational DB Management System)
관계형 DB, 'table'형태로 저장, 테이블 구조: Schema
 ex)MySQLm MariaDB, Oracle)
```



<% %> : jaba code를 넣기 위한 표시



DB에 접속하기 위한 정보들을 입력하고 접속을 위한 try ~ catch문 후 마지막에 finally로 자원 반납



rs.next()로 정보를 받아와야하는데 받아온 데이터가 몇개인지 모르나 있는만큼 다 나와야하기 때문에(until null) while(re.next())를 사용해 받아온 정보를 출력해준다.



JSP(: Java Server Page)
: HTMP 내부에 java 코드를 입력하여, 웹 서버에서 동적으로 웹 브라우저를 관리하는 언어
JSP를 이용하면 PHP처럼 html 코드와 같이 자바 코드를 사용해 동적인 웹 페이지를 만들 수 있다.


> request.setCharacterEncoding("UTF-8");

html 파일에서 POST 방식으로 전달받은 데이터를 JSP 내장객체인 request로 받음



> String employee_id = request.getParameter("employee_id");

request.getParameter("변수이름") 을 통해 전달받은 데이터를 변수에 저장



> pstmt = conn.prepareStatement(sql);	

ORACLE DB에 sql문 전달



> int n = pstmt.executeUpdate();

update된 행의 개수를 보여줌. pstmt.executeUpdate()의 반환값이 문제가 된다면 n<=0 이 됨.

그 경우 오류메세지를 보여주기 위해 
> <script type="text/javascript">
	if(<%=n%> > 0){
		alert("정상적으로 삭제되었습니다.");
		location.href="../index.html";
	}else{
		alert("입력이 실패했습니다.");	
		history.go(-1);
	}
</script>

코드 추가


# 문제가 발생하거나 고민한 내용
톰캣의 기본 포트 설정인 8080이 아닌 8090 포트번호 사용

오라클 db와 연결할 때 "Ping succeeded!"가 안떠서 한참 헤맸는데 

Service Name: xe, Host: localhost, Port number: 1522, User name: hr, password: 1234 로 설정해야한다.


다 완성하고 나서 데이터 삭제를 누르면 계속 로딩만 되고 실행되지 않아 코드에 문제가 있는 줄 알고 계속 수정하려고 한참 헤맸는데 아무리 봐도 없어서 일단 끄고 다음날에 다시 켜서 똑같이 했는데 됐다 ㅎㅎ..
이클립스도 처음에 실행오류가 떠서 다시 껏다 켜니까 됐는데 이제 컴퓨터가 이상한건지.. 내가 이상한건지 모르겠다.

# 참고할 만한 내용
오류 해결을 위해 많은 자료들을 찾아보았지만 내 컴퓨터와 적용된 것은 없고 껏다 켜니까 됐다


# 회고
\+ 이클립스에서 코딩한 결과를 볼 수 있다는 점이 좋았다!

\- User name: hr, password: 1234 인데 로그인이 안돼서 오라클로 로그인했다가 MySQL로 로그인했다 왔다갔다했다. 많은 데이터베이스를 다루다보니 이제 비밀번호가 전부 헷갈린다..

\! JSP와 JAVA, 톰캣에 대해 새로 알게되었다.

# 테스트 동영상
https://youtu.be/SFa1FuY6rjA
