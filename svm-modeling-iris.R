#install.packages("e1071")
library(e1071)
data(iris)

test.index = sample(1:nrow(iris),15)

test.data = iris[test.index,] 
train.data = iris[-test.index,] 

tuned <- tune.svm(Species ~., data = train.data, gamma = 10^(-3:-1), cost = 10^(-1:1)) 
summary(tuned)

svm.model <- svm(Species ~ ., data = train.data, type='C-classification', cost = 1, gamma = 0.1)

summary(svm.model)
svm.pred <- predict(svm.model, test.data[,-5])


(table.svm.test=table(pred = svm.pred, true = test.data[,5]))

correct.svm <- sum(diag(table.svm.test))/sum(table.svm.test)
(correct.svm<-correct.svm*100)


save(svm.model,file="C:\\Users\\Dean\\Desktop\\CLanguage\\big_data\\big\\iris-svm.RData")

