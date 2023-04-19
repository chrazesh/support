CREATE database info;
CREATE TABLE `customer` (
  `id` int(20) primary key NOT NULL auto_increment,
  `company_name` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `phone_no` bigint(100) NOT NULL,
  `mobile` bigint(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pan_no` bigint(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL
);

CREATE TABLE `demo` (
  `id` int(20) primary key NOT NULL auto_increment,
  `date` varchar(50) NOT NULL,
  `company_name` varchar(20) NOT NULL,
  `customer_company_name` varchar(20) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` bigint(50) NOT NULL,
  `mobile` bigint(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pan_no` varchar(50) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  `remarks` varchar(50) NOT NULL,
 
) ;

CREATE TABLE `inquiry` (
  `inquiry_id` int(20) primary key NOT NULL auto_increment,
  `customer_id` int(20) NOT NULL,
  `company_name` varchar(20) NOT NULL,
  `date` varchar(50) NOT NULL,
  `miti` varchar(50) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `company_email` varchar(20) NOT NULL,
  `person_email` varchar(20) NOT NULL,
  `reference_by` varchar(20) NOT NULL,
  `software_type` varchar(20) NOT NULL,
  `organization_type` varchar(20) NOT NULL,
  `phone` bigint(50) NOT NULL,
  `pan_no` bigint(20) NOT NULL,
  `follow_up` varchar(20) NOT NULL,
  `next_follow` varchar(20) NOT NULL,
  `feedback` varchar(50) NOT NULL,
   FOREIGN KEY (customer_id) REFERENCES customer(customer_id),
);

CREATE TABLE `installation` (
  `id` int(100) primary key NOT NULL AUTO_INCREMENT,
  `company_name` varchar(30) NOT NULL,
  `company_email` varchar(20) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `person_email` varchar(20) NOT NULL,
  `pan_no` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `type` varchar(100) NOT NULL,
  `no_of_users` bigint(20) NOT NULL,
  `installation_date` varchar(20) NOT NULL,
  `exp_date` varchar(100) NOT NULL,
  `installed_by` varchar(20) NOT NULL,
  `referenced_by` varchar(100) NOT NULL
) ;


CREATE TABLE `login_details` (
  `id` int(100) primary key NOT NULL auto_increment,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ;


CREATE TABLE `support` (
  `id` int(100)  NOT NULL auto_increment,
  `company_name` varchar(20) NOT NULL,
  `client_name` varchar(20) NOT NULL,
  `call_by` varchar(100) NOT NULL,
  `support_staff` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `issue` varchar(200) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  `remote_onsite` varchar(100) NOT NULL,
  `status` varchar(200) NOT NULL
) ;