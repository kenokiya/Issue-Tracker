import { Home } from "../../pages";
import MyIssues from "../../pages/MyIssues";
import { ViewIssue } from "../../pages/ViewIssue";

export const useRouter = () => [
  // myIssues
  {
    path: "/",
    element: <Home />,
  },
  {
    path: "/my_issues",
    element: <MyIssues />,
  },
  {
    path: "/my_issues/:id",
    element: <ViewIssue />,
  },
];
