<?php

// ��������� ��� �������, ������� ����� ��������� ��� ����������
interface LeadInterface {
    public function leadTeam();
}

// ��������� ��� �������, ������� ����� ���������� ����������� ����������
interface ApplicationCreatorInterface {
    public function createApplication();
}

// ��������� ��� �������, ������� ����� ����� ������� ��� ������
interface WebinarSpeakerInterface {
    public function conductWebinar();
}

// ������� ����� ���������
class Employee {
    protected $firstName;
    protected $lastName;
    protected $salary;

    public function __construct($firstName, $lastName, $salary) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->salary = $salary;
    }

    public function getFullName() {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getSalary() {
        return $this->salary;
    }
}

// ����� ��������
class Director extends Employee implements LeadInterface, WebinarSpeakerInterface {
    public function leadTeam() {
        // ������ �����������
        return "Leading the team.";
    }

    public function conductWebinar() {
        // ������ ���������� ��������
        return "Conducting a webinar.";
    }
}

// ����� ��������
class Manager extends Employee implements LeadInterface {
    public function leadTeam() {
        // ������ �����������
        return "Leading the team.";
    }
}

// ����� �����������
class Programmer extends Employee implements ApplicationCreatorInterface {
    public function createApplication() {
        // ������ �������� ����������
        return "Creating an application.";
    }
}

// ����� �����������
class Tester extends Employee {
    public function testApplication() {
        // ������ ������������ ����������
        return "Testing the application.";
    }
}

// ������ ������������� �������
$director = new Director('John', 'Doe', 5000);
$manager = new Manager('Jane', 'Smith', 4000);
$programmer = new Programmer('Bob', 'Johnson', 4500);
$tester = new Tester('Alice', 'Williams', 3500);

// ����� ���������� � ������ ����������
echo $director->getFullName() . ": " . $director->leadTeam() . " " . $director->conductWebinar() . " Salary: " . $director->getSalary() . PHP_EOL;
echo $manager->getFullName() . ": " . $manager->leadTeam() . " Salary: " . $manager->getSalary() . PHP_EOL;
echo $programmer->getFullName() . ": " . $programmer->createApplication() . " Salary: " . $programmer->getSalary() . PHP_EOL;
echo $tester->getFullName() . ": " . $tester->testApplication() . " Salary: " . $tester->getSalary() . PHP_EOL;

// ����� ������ ���������� ����������� � ����� �������� �� �����
$totalEmployees = [$director, $manager, $programmer, $tester];
$totalSalary = 0;

foreach ($totalEmployees as $employee) {
    $totalSalary += $employee->getSalary();
}

echo "Total Employees: " . count($totalEmployees) . PHP_EOL;
echo "Total Salary: " . $totalSalary . PHP_EOL;

