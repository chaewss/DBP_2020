<새로 배운 내용>

기억할것
> cd /var/www/html/DBP_2020
> sudo mysql -uadmin -p
> USE employees;


PHP
php는 값을 대입할 때 type 확인. 변수 제일 앞에 $ 표시.

> print $a

함수와 같이 return 값 존재

> echo $a

반환되는 값 X

gettype() : 변수의 타입을 알 수 있음
settype() : 어떤 값을 어떤 형태로 바꿀지 타입 지정

연관배열은 index에 숫자가 아닌 의미있는 string 문자열이 들어갈 수 있음

> array_push($배열이름, 값);

배열에 값 넣음

> var_dump($배열이름);

배열 형태로 출력하고 싶을 때

> sort($배열이름);

배열 내부 값 정렬


<문제가 발생하거나 고민한 내용>
원하는 부서 이름과 숫자를 입력하면 해당 부서의 직원 이름이 숫자만큼 나온다.
index.php에
> <form action="depart_info.php" method="GET">
        (6) 부서 정보 <br>
        <select name="department">
            <option value="Customer Service">Customer Service</option>
            <option value="Development">Development</option>
            <option value="Finance">Finance</option>
            <option value="Human Resources">Human Resources</option>
            <option value="Marketing">Marketing</option>
            <option value="Production">Production</option>
            <option value="Quality Management">Quality Management</option>
            <option value="Research">Research</option>
            <option value="Sales">Sales</option>
        </select>
        <input type="text" name="number" placeholder="number">
        <input type="submit" value="Search">
    </form>

sql문을 추가한 후 depart_info.php에
> $filtered_dept_name = mysqli_real_escape_string($link, $_GET['department']);
> $filtered_number = mysqli_real_escape_string($link, $_GET['number']);

값을 받아온다. 쿼리는

> SELECT first_name, last_name, dept_name
    FROM dept_emp
    INNER JOIN employees on employees.emp_no=dept_emp.emp_no
    INNER JOIN departments on departments.dept_no=dept_emp.dept_no
    WHERE departments.dept_name = \"{$filtered_dept_name}\"
    LIMIT {$filtered_number}

를 사용해 결과값을 받아온다.

<참고할 만한 내용>
https://thrillfighter.tistory.com/572

<회고>

'+ : 우분투와 apache, 마리아디비, 호스트 컴퓨터의 관계가 복잡해서 정확하게 이해가 잘 되지 않았는데 이번 수업에서 교수님이 다시 설명을 해 주셔서 좋았다. 

'- : 쿼리 스트링을 넣는 부분에서 WHERE departments.dept_name = "Sales" 이런식으로 큰따옴표가 필요한 부분에서 { }를 사용해보기도 하고 .을 이용해서 이어보기도 했으나 마지막에 찾은 답은 \"를 추가해 "를 인식하게 하는 방법이였다.

'! : 입력값을 받아 쿼리에 반영하는 부분이 재미있었다. 또 정확하게는 알지 못했던 PHP 문법을 정리하고 넘어가서 좋았다.

테스트동영상 : https://youtu.be/4OmGJYcEUow
