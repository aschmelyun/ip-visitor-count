# ip-visitor-count
A simple tool that lets you search through a standard unix access log to determine visitor count by IP address of a particular path or string.

### Why?

I built this trying to determine the most frequent IP addresses hitting the login page of my application, and this seemed like the easiest solution.

### Installation

You can just clone this repo and use the included script as-is with `php ip_visitor_count.php` or for easier access you can do:

* `chmod +x ip_visitor_count.php`
* `sudo cp ip_visitor_count.php /usr/local/bin/ipvc`

The script can now be accessed with just the `ipvc` command. :tada:


### Usage

The syntax of the script is `ipvc access.log 'string to search'`. So for example, I want to see what the most frequent IP addresses are that are accessing my WordPress login page, I would do `ipvc access.log 'GET /wp-login.php'`. The script runs, and returns an array of ip address => hits sorted in descending order. :fire: :fire: :fire:
