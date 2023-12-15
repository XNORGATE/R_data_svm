args = commandArgs(TRUE)

Sepal.L = as.numeric(args[1])
Sepal.W = as.numeric(args[2])
Petal.L = as.numeric(args[3])
Petal.W = as.numeric(args[4])


#Sepal.L = 5.9
#Sepal.W= 3.0
#Petal.L = 5.1
#Petal.W= 1.8



# library("httr",lib.loc= "C:/Users/user/AppData/Local/R/win-library/4.2")
# library("curl",lib.loc= "C:/Users/user/AppData/Local/R/win-library/4.2")
# library("rjson",lib.loc= "C:/Users/user/AppData/Local/R/win-library/4.2")

#library("httr",lib.loc= "C:/Users/q/AppData/Local/R/win-library/4.2")
#library("curl",lib.loc= "C:/Users/q/AppData/Local/R/win-library/4.2")
#library("rjson",lib.loc= "C:/Users/q/AppData/Local/R/win-library/4.2")



library("e1071",lib.loc= "C:/Users/Dean/AppData/Local/R/win-library/4.3")
load("iris-svm.RData", .GlobalEnv)
flower <-data.frame(Sepal.Length=Sepal.L,Sepal.Width=Sepal.W,Petal.Length=Petal.L,Petal.Width=Petal.W,Species=NA)
svm.pred <- predict(svm.model, flower[,-5])
ans <- as.vector(svm.pred)


print(ans)
print(Sepal.L)
print(Sepal.W)
print(Petal.L)
print(Petal.W)

dev.off()







