FROM mariadb:10.4

RUN sed -Ei 's/^(bind-address|log)/#&/' /etc/mysql/my.cnf
RUN bash -c "echo 'innodb_flush_method=littlesync' >> /etc/mysql/conf.d/docker.cnf"
RUN bash -c "echo 'innodb_use_native_aio=OFF' >> /etc/mysql/conf.d/docker.cnf"
RUN bash -c "echo 'log_bin=ON' >> /etc/mysql/conf.d/docker.cnf"
RUN bash -c "echo 'log_bin=ON' >> /etc/mysql/conf.d/docker.cnf"