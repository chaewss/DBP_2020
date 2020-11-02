<새로 배운 내용>

Apache 서비스 실행, 종료, 재실행(재실행은 웹서버 설정 변경했을 시 자주 사용)
> sudo systemctl [start | stop | restart] apache2.service

80, 443 포트 방화벽 열기
> sudo ufw allow 80/tcp comment 'accept Apache'
> sudo ufw allow 443/tcp comment 'accept HTTPS connections'

네트워크 상태로 주고받는 통로는 방화벽으로 막아져 있기 때문에 열어야 함
문을 열어야 Apache 서버가 웹 서버에서 데이터를 주고받음

ufw : 방화벽을 설정할 수 있는 서비스

방화벽 상태 확인
> sudo ufw status

방화벽 사용
> sudo ufw enable

ip 주소 확인
> hostname -I

/var/www/html/index.html

위 경로 부분을 수정하면 파일 변경 가능

<문제가 발생하거나 고민한 내용>

처음 우분투를 설치하고 마우스, 키보드키가 안먹어서 한참 헤맸다.
https://jangjy.tistory.com/351
나와있는 방법대로 하려고 했으나 로그인화면이 어딨는지 찾지를 못해서 헤매다가 보니까 어느 순간 됐다..

<참고할 만한 내용>

:q vi 편집기 종료

:q! 수정된 내용이 있어도 저장하지 않고 무조건 종료

:wq 수정 내용 저장 후 종료

<회고>

'+ : 시스템프로그래밍 수업에서 썼던 vi 편집기를 사용해서 반가웠다. :wq나 i 같은 명령어들이 익숙해서 그나마 덜 당황했던 것 같다.

'- : 컴퓨터시스템관리 수업 수강을 안했었는데 후회가 된다.

'! : 백업 파일 꼭 만들어놓기(이걸 밀고 다시 깔 생각 하면...)

테스트동영상 : https://youtu.be/C-IW91VVgog
