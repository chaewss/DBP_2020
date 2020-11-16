# 새로 배운 내용
> Statement stmt = conn.createStatement();

sql문을 보낼 수 있는 객체 만듦

> ResultSet re = stmt.executeQuery(sql);

보낸 결과값을 ResultSet이라는 객체 rs에 넣음

DB는 연결되어 있는 동안 resource를 차지하고 있기 때문에 반드시 close 해줘야 함


SQL 쿼리 전송 인터페이스에는 Statement, PreparedStatement, CallableStatement가 있는데 이 중 PreparedStatement가 가장 많이 사용된다.
(!사용시 반드시 try catch문 또는 throws 처리 해야 됨!)
PreparedStatement는 sql문장이 미리 compile 되고(수행속도 빠름) 실행시간동안(동적 쿼리 처리) 인수 값을 위한 공간 확보 가능. 한번 분석되고 나면 재사용 가능. 기호를 신경쓰지 않고 다 sql문으로 처리해 보안이 확보됨 또, column의 이름으로 접근 가능


# 문제 발생 및 해결 내용


# 참고 내용


# 회고
 - 이번에도 또다른 툴들을 다뤄볼 수 있게되어 좋다. 사실 그동안 이클립스 얘기는 정말 많이 들었는데 한번도 사용해본적이 없었는데 이 기회에 사용하게 되서 좋았다.
 - 강의를 보면서 똑같이 교수님 따라서 설치했는데 db와 연결하는 실습을 진행할 때 try~catch문의 catch 조건을 작성하는 부분에서 오류가 났다. 해결과정에서 ~~1.7 이렇게 되어있어서 버전과 관련된 문제 같은데 저걸로 고쳐서 나중에 실습할 때 오류가 날까봐 살짝 두렵다.
 - 클래스를 생성하면 교수님은 public static void main(String[] args)문이 바로 생성되는데 나는 바로생성되지 않아서 직접 쳐야한게 불편했다. >> 교수님께서 보내주신 자료(참고내용-자바 메인메소드 public static void main(String[] args)를 이해하자)를 보고 클래스 생성 시 바로 생성해주는 체크박스에 체크하여 자동 생성되게 만들었다!

# 테스트 동영상
https://youtu.be/j5QnlwQvz_E
