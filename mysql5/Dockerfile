FROM mysql:5

# Better conf
COPY mysqld.cnf /etc/mysql/mysql.conf.d/mysqld.cnf

# Set China timezone
RUN /bin/cp /usr/share/zoneinfo/Asia/Bangkok /etc/localtime && \
    echo 'Asia/Bangkok' > /etc/timezone
