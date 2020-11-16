# 새로 배운 내용
> Statement stmt = conn.createStatement();

sql문을 보낼 수 있는 객체 만듦


> ResultSet re = stmt.executeQuery(sql);

보낸 결과값을 ResultSet이라는 객체 rs에 넣음


DB는 연결되어 있는 동안 resource를 차지하고 있기 때문에 반드시 close 해줘야 함


SQL 쿼리 전송 인터페이스에는 Statement, PreparedStatement, CallableStatement가 있는데 이 중 PreparedStatement가 가장 많이 사용된다.
(!사용시 반드시 try catch문 또는 throws 처리 해야 됨!)
PreparedStatement는 sql문장이 미리 compile 되고(수행속도 빠름) 실행시간동안(동적 쿼리 처리) 인수 값을 위한 공간 확보 가능. 한번 분석되고 나면 재사용 가능. 기호를 신경쓰지 않고 다 sql문으로 처리해 보안이 확보됨 또, column의 이름으로 접근 가능


# 문제가 발생하거나 고민한 내용
IntelliJ에서 돌릴 때 java.lang.ClassNotFoundException: oracle.jdbc.driver.OracleDriver 이라는 오류가 떳는데 항상 프로젝트 설정(Ctrl, Alt, Shift + S)에 들어가서 라이브러리에 jar의 위치 C:\Program Files\Java\jdk1.8.0_271\lib\ojdbc6.jar 를 입력해주면 된다.
앞으로도 모든 프로젝트를 돌릴때마다 추가해줘야 할 것 같아서 기록해놓는것!
--------------------------------------------
sqldeveloper 창을 띄워놓고 IntelliJ 컴파일을 하면 데이터베이스 정보 수정이 제대로 되지 않는다. 이유는 모르겠음.. 혹시 몰라서 sqldeveloper 을 종료했더니 잘 나온다.

# 참고할 만한 내용


# 회고
\+ 같은 내용의 코드를 여러번 쓰는 것이 마음에 조금 걸렸는데 리팩토링을 통해 하나의 메서드로 구현해놓으니 훨씬 편리하다!
\- 나도 sqldeveloper 창 띄워놓고 컴파일 해보고싶다.. 이유가 뭘까?.. 구글링해도 안나온다. 어떤 키워드로 구글링해야되는지도 모르겠다.
\! 자바를 사용해 메서드단위로 짜니까 편리하다. 여러 파일을 만들고 그 파일들을 서로 연결시켜야 하는 부분이 불편했는데 객체단위로 프로그램을 짜는 것이 이런 부분에서 편리한 점도 있다는게 새로웠다.

# 테스트 동영상
https://youtu.be/j5QnlwQvz_E
