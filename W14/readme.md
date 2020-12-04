# 새로 배운 내용

```
* RDBMS(: Relational DB Management System)
관계형 DB, 'table'형태로 저장, 테이블 구조: Schema
ex)MySQLm MariaDB, Oracle)
 
* NoSQLDBMS
JSON과 비슷한 document 형식으로 데이터 저장
ex) MongoDB (mongod.exe: Server,  mongo.exe: CT)

network, cloud 환경으로 변화하면서 대규모 데이터를 어떻게 처리할 것인지에 대한 문제점 대두
그로인해 안정성있게 사용가능하던 RDBMS에서 확장성과 성능, 빠른 속도를 보장하는 NoSQL을 많이 사용하기 시작
```

```
MongoDB 구조
Database > Collections(어떤 종류의 document인지 구분) > Documents

value값을 여러 개 저장할 수 없었던 RDBMS와는 달리 대괄호를 이용한 배열 형태로 value값 다중 저장 가능

mongoDB는 대규모 데이터를 처리하기 때문에 용량, 속도의 문제로 포인터인 cursor 사용.
cursor는 찾고자 하는 데이터의 첫 번째 위치를 가리킴. 직접 데이터를 가져오지 않아도 위치 값을 통해 데이터에 접근 가능
```


# 문제가 발생하거나 고민한 내용
```
이전에 프로젝트할 때 DB를 mongoDB로 사용했어서 이미 다 설치되어있어서 설치 중 문제 발생한 내용이 없다
```


# 회고
```
+ 데이터를 확장할 때 관계성을 머리아프게 생각하지 않아도 되는 점이 정말 좋다. 프로젝트 때 MongoDB를 다뤄보았지만 개발에 급급해
  제대로 된 구조는 확실하게 모르고 썻던 것 같다. 이번 기회에 알게 되어 좋다!

- 괄호가 복잡해 실수하기 쉽다

! MongoDB는 RDBMS와는 다르게 document로 되어있다는 것
```

# 테스트 동영상
https://youtu.be/ukQAtp8-qi0
