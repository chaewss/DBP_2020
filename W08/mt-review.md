### <문제가 발생하거나 고민한 내용 => 새로 배운 내용>

1) 오류 warning mysqli_fetch_array() expects parameter 1 to be mysqli_result boolean given 가 뜰 경우 세부적인 오류의 이유를 모르기 때문에 
>$result = mysqli_query($link, $query) or die(mysqli_error($link));

처럼 끝에 or die(mysqli_error($link)) 구문을 추가해 오류의 상세 이유를 알아냈다.
내 경우 Unknown column 'cua.last_name' in 'where clause' 가 떳고 해당 내용을 수정해 제대로 된 값을 출력할 수 있었다.



2) 검색 값을 제대로 입력하지 않았을 경우 경고 메세지가 뜨며 커서가 해당 텍스트박스로 이동하는 기능을 구현하고 싶어서 자바 스크립트를 사용하는 방법을 열심히 찾아봤지만 왜인지 내 사이트에서는 작동하지 않았다. 그래서 다른 방법을 고민하던 중 cmd에서 쿼리의 결과가 나오지 않는 경우 "Empty set"이라는 문구가 뜨는 것을 보고 행의 개수를 세서 if문의 조건으로 이용하면 좋을 것 같다는 생각에 아래의 조건문을 추가하였다.
>$count = mysqli_num_rows($result);
    if ($count == 0) { 
        header('Location: ');
    }

### <참고할 만한 내용>

오류 세부 내용 출력 : https://lunaticlobelia.tistory.com/465

### <회고>

#### + : 시험을 과제로 대체하다보니 여유를 갖고 원하는 방향의 결과를 스스로 찾아 낼 수 있어서 좋았다. 또 만족하지 못하는 부분에서 계속 더 고민하고 생각하다보니 과제의 완성도가 그래도.. 조금 더 좋아진 것 같다.

#### - : 캐글을 이용해서 데이터베이스 분석을 하고 싶었지만 엑셀 파일을 데이터베이스 파일로 변환하는 과정에서 어려움을 겪다가 결국 포기..
첫 번째 메뉴인 배우별 영화검색 부분에서 ROLLUP함수가 너무 쓰고 싶어서 2시간을 헤맸지만 쓰지 못했다..........

#### ! : 이번 기회로 html문 내부에서 php를 이용하는 방법을 완전!! 확실하게 알게 되었다.
