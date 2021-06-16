# DEMO_APUGIMA

##  **1. Project description**

<br/>

- **프로젝트 진행 기간** : 2020.09 ~ 2020.12
- 많은 질병이 사회 문제로 부상함에 따라 건강 문제도 크게 증가하고 있다.
- 따라서 본 프로젝트에서는 **사용자가 방문한 병원과 복용한 약에 대한 후기를 공유**할 수 있는 웹 페이지 "APUGIMA"를 제안한다.
- 본 웹 사이트에서는 특정 병원이나 약을 검색하고, 리뷰 & 진료 요금을 볼 수 있다.
- 특히 병원의 경우 병원 유형, 주소, 연락처 등 병원에 대한 세부 정보를 확인할 수 있다. 
- 본 웹 사이트를 이용해 사용자는 질병 일기를 작성하고, 웹 사이트의 처방전을 보관하고, 유용한 건강 컬럼을 읽어 자신의 건강 상태를 지속적으로 확인하고 유지할 수 있다.
- 추가적으로, 사회적 이슈인 서울의 "Covid 19" 상황에 대한 몇 가지 분석을 제공한다. 

<br/>

## **2. Tech Stack**

<br/>

- **FrontEnd** : html, css, bootstrap
- **BackEnd** : php, MySQL, Apache
- **Data Visualization** : Google chart API
- **Cross Platform Package** : XAMPP
- **Data source** : http://data.seoul.go.kr/dataList/OA-20279/A/1/datasetView.do;jsessionid=0F5820EB86EF25B43D11D0A711B387FC.new_portal-svr-21
- **Configuration management & Collaboration tool** : Github, Slack, KakaoTalk, Google Drive

<br/>

## **3. System Architecture**

<br/>

![img](https://lh5.googleusercontent.com/ZB6t-fwKYs4hGEiXfid7zPjc1JTs75KnbeSSoUC58CTfbDp-oz_uv9AjgUH8F3Ul356fmc3x4I3O7r_abcZjqJke-8lxdatiR0sMonDfsX5jRaj9F81Gdw_rQpGQKQ)

<br/>

## **4. Database Schema**

<br/>

![img](https://user-images.githubusercontent.com/37237145/106232560-a7086280-6237-11eb-8f13-0cb09e04d673.JPG)



각 테이블은 다음과 같이 설계되었다. 

1. **Accounts** : UserID, User Name, Gender, Birthday, Password
2. **Hospitals** : HopsitalID, Hospital Name, Hospital type, Address, Contact, URL
3. **Medicines** : MedicineID, Medicine Name
4. **Diseases** : Disease Code, Disease Name, Symptom, Category
5. **Prescriptions** : RecordID, UserID, Date, HopsitalID, MedicienID
6. **Diaries** : DiaryID, UserID, Disease Code, MedicineID, Content, Date
7. **Hospital Reviews **: ReviewID, UserID, HopsitalID, Memo, Rate
8. **Medicine Reviews **: ReviewID, UserID, MedicineID, Disease Code, Memo, Rate
9. **Columns** : ColumnID, Date, Title, Content, Category

<br/>

## 4. **Overview of PHP code structure as a diagram**

<br/>

![img](https://lh6.googleusercontent.com/k8ruxraSM9Q3-4FGf6RE44uF_TaZO8m12-KFn3f8nFvWg7jvUwijcT26ohRHlvGMAoV7GWsIUx4BEZ2-MpaVjQl-ZKF1XcxCHBzE05RUtHDitotg-4mpiJTMtHOFRuW1sg5hTkVY)

<br/>

## **5. User Story**

<br/>

![img](https://lh6.googleusercontent.com/emBvmROIQrtvNkyRbTgz_3b_FB5bEDuVoMsJCPBvSPxzO70OYSrDwnhDx54cuy6hgyeycpD17Bm-F9brHNwKMwy5f61OwmTueJw3DC0SBKnhtbt6JJC5Mu7UspxAbQ)

- 사용자가 웹 페이지에 접속하면 6개의 섹션을 가진 헤더가 기본 페이지에 표시된다. (Covid 19, Hospital, Medicine, Column, My Page, Login)
- **Covid 19** 섹션에서 사용자는 코로나 환자 분석 그래프를 볼 수 있다.
- **Hospital** 섹션에서는 다른 사용자가 등록한 병원을 검색하고, 병원 리뷰를 작성할 수 있다. 이 섹션에서 '랭킹 보기' 서비스도 제공하는데, 이 버튼을 클릭하면 사용자 평가 점수가 높은 상위 10개의 병원을 볼 수 있다.
- **Medicine** 섹션에서는 약 리뷰 조회 & 생성이 가능하다 . 페이지에 표시되는 약 점수는 모든 사용자가 부여한 점수의 평균이다. 
- **Column** 섹션에서는 홈페이지 관리자가 작성한 의료 정보를 볼 수 있다. 
- **My Page** 섹션에서는 사용자가 자신의 건강 상태를 다이어리 형태로 작성하고, 자신이 작성한 리뷰를 편집 및 삭제할 수 있다. 또한 처방 섹션에 처방 기록을 등록하여 자신의 병원 처방 이력을 관리할 수 있다. 처방 이력은 가장 최근의 처방 순으로 사용자에게 보여진다. 

<br/>

## **6. Results**


- **Result Video Link**
  - https://drive.google.com/file/d/1B_7fxRFe6z2SGR8pTARNSkMKZ4kGbVh9/view?usp=sharing

- **Main Page**

![img](https://lh5.googleusercontent.com/0CWLj9N9PIXGps-naNh4HuUjBVt_AJB2DKp5mdJgbXleNIHml2QTideLga1N7jrvhW7IaQJAQg-XGEJOfZnzQcNHe7yHRKq4RyPlZ_3useG5dPv_yuuv93TSQWd0tgRTcpLdkj-CVfM)

<br/>

- **Covid 19**

![img](https://lh4.googleusercontent.com/5B6peB8LWiv4gL391987RGO_DICZUwK4J85pBqubG3af5XRuNZNDGr5YzzMqPTyvlbD-ZrQF72ByO8pjKQ4HgnNwyFP6RTXf6Bq1wZ_tAOv5a3qzho0pyFQgGAVvt146Qcb-YsrglZk)

<br/>

- **Hospital**

![img](https://lh4.googleusercontent.com/5620yQ_binCVM1H6yqey7-6ASiydfT3wOLTXVQB3z5XDU8GkT-DpvLa6sM3YmoM60jvpNWna_lX3xzLogT7_oCvOXXYg-tklrygABCBDwAFBZaxvvgUHjJw34CJERbNJqZF_W7VENzk)

<br/>

- **Medicine**

![img](https://lh5.googleusercontent.com/CYqYzOVSl8j4Ro_cT9tSXYF90GiuWsuQM3eF1hafpWYAO98PeBFxVUVP95pbPQ_J1Ybrd0ExmYelQy8HVVJTjs7VC8IAJmc1HqAkh38vBQNEjy6vl5GHpPpSvuuJfGbTuM_ZwnMTSSI)

<br/>

- **Column**

 ![img](https://lh4.googleusercontent.com/vyNvsYUGK8U33kMimZICOLOaBmOtxmDg5elLxeq7c93FhC23m7RuIF6mIjr1Nh0xl61_N6pictNWK4i53vq-8AMseAWTwjUM3Qlniy9AT7bH3H6gXEqMk6ik_Wu1ZzrfieKhXDS_bUE)

<br/>

- **My Page - Diary**

 ![img](https://lh4.googleusercontent.com/skQhClkvvv5pCrpn5cj2hOV9g6dKKzOFnNxPb9a2Wz1He7tfyEN1yOOugT9slzZ6Am46s0S-gN1qZh0TkZ0otaUh42B08rr1OawvUThzCofY1kfz9bxFyFvQmi8KMTqWVyqEu-3weME)

<br/>

- **My Page - Prescription**

![img](https://lh5.googleusercontent.com/8vmnNhWRa9hkKIaF1obewmhgKB81SUj_EBKQq55mJdM48sOu0_GsG6ErUHwOdBRDVCVpiHVsYofcWbleqKDsznC030U3mDtZ0IacSv3FddV4NbnGTn6Elp_FjlLo9gni4EVJHsDFsSM)

<br/>

- **My Page - My Review**

![img](https://lh4.googleusercontent.com/EWYqF0tzPUrga6SF1nYAtBmeEZgDgr-0bO0s1QPhTGdu51GFkwmP6vaCg_HCrr5gCxkd7VOqf5CiXD5k3lCaW3p5M4NOQFj0XNdkA7FFEul_E1Oltsvqyt0ghDicCgoKhJt_cs9JN3E)
