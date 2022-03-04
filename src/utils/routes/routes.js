import { CreateIssue, Home, MyIssues, ViewIssue } from "../../pages";
import { TaggedIssue } from "../../pages/TaggedIssue";

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
  {
    path: "/my_issues/create",
    element: <CreateIssue />,
  },

  {
    path: "/tagged",
    element: <TaggedIssue />,
  },
];
