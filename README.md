# Exads
Exads technical test exercises

Technical test - Clarifications 

Technical details:

1) It was used PHP 8.0.3 for doing this technical test with Visual Studio Code as code edit.

2) Naming conventions have been respected, such as PSR1, PSR2, PSR4.

3) It has been interpreted that Exads wants to see how to establish a connection to the database without using an ORM, such as Eloquent. This ORM can be used without the need to use Laravel, however, due to the aforementioned interpretation, the connection has been established through Mysqli (it could also have been done with PDO).  A .sql file is included.

4) To comment code, @return, @author, and @param have been mainly used.  However, this does not imply that only those are always used. It depends on the needs of the project.

Peculiarities of the exercises:

1) Exercise nº4: Print a string that includes the name of the chosen design. This could also be overridden by the return of the Promotion or Design.

2) Exercise nº3: Print a string with the information of the series and the date of when it will be transmitted. In this case it could also be replaced by the return of the object.  Personally, I would not use that database design, because a series is normally transmitted on more than one channel, and with the current design there are two options.

    2A) It is transmitted by channel only.

    2B) It is transmitted by more than 1 channel but the information of the series has to be duplicated.
        I would create a "channels" table and create an N to M relationship between the series and the channels, in such a way that N series are transmitted on a channel and the same series can be transmitted on N channels.

3) Exercise nº2: Print an array containing all the ASCII characters from ',' to '|'. Subsequently, a string is printed that contains the information of the missing character.  It has been interpreted that the function in charge of looking for the removed ASCII character and then returning it knows that the array starts at ',' up to '|.
