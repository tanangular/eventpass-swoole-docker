FROM mysql

# Better conf
COPY mysqld.cnf /etc/mysql/mysql.conf.d/mysqld.cnf

# set Thailand/Bangkok timezone
RUN /bin/cp /usr/share/zoneinfo/Asia/Bangkok /etc/localtime && \
    echo 'Asia/Bangkok' > /etc/timezone
